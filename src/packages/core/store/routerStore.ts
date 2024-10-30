import { useEffect } from 'react';
import { StateCreator } from 'zustand';
import { createStore } from 'zustand/vanilla';
import { persist, PersistStorage } from 'zustand/middleware';

import { createBoundedUseStore, decodeURLParams } from '../utils';

const getUrlSearch = () => {
  return window.location.search.slice(1);
};

const paramsKeys = ['path', 'page_index'] as const;

type ParamsState = {
  path: string;
  page_index?: string;
};

type State = {
  path: string;
  page?: number;
  isEditing?: boolean;
  confirmLeave?: () => Promise<boolean>;
  isPush: boolean;
};

const keyMap: Record<keyof ParamsState, keyof State> = {
  path: 'path',
  page_index: 'page',
};

const persistentStorage: PersistStorage<State> = {
  getItem: (key) => {
    if (key !== 'searchParams') return null;

    const searchParams = new URLSearchParams(getUrlSearch());
    const paramsState = Object.fromEntries(searchParams.entries()) as ParamsState;
    const state: State = {
      path: paramsState.path ?? '/',
      page: paramsState.page_index ? Number(paramsState.page_index) : undefined,
      isPush: false,
    };

    return { state };
  },
  setItem: (key, newValue: { state: State }): void => {
    if (key !== 'searchParams') return;
    if (!newValue.state.isPush) return;

    const searchParams = new URLSearchParams(getUrlSearch());
    paramsKeys.forEach((key) => {
      const value = newValue.state[keyMap[key]];
      if (typeof value === 'function') return;
      if (value === undefined) {
        searchParams.delete(key);
      } else if (typeof value === 'string') {
        searchParams.set(key, value as string);
      } else {
        searchParams.set(key, JSON.stringify(value));
      }
    });

    if (!searchParams.has('path')) searchParams.set('path', '/');
    const search = decodeURLParams(searchParams);
    if (search === getUrlSearch()) return;

    window.history.pushState(null, '', `?${decodeURLParams(searchParams)}`);
  },
  removeItem: (key): void => {
    if (key !== 'searchParams') return;

    const searchParams = new URLSearchParams(getUrlSearch());
    paramsKeys.forEach((key) => {
      const paramsKey = Object.keys(keyMap).find((k) => keyMap[k] === key);
      if (!paramsKey) return;
      searchParams.delete(paramsKey);
    });
    window.location.search = searchParams.toString();
  },
};

type ParamsWoPath = Omit<State, 'path'>;

type StoreState = State & {
  setPath: {
    (path: string, params?: ParamsWoPath): Promise<void>;
    (path: string, params: Partial<ParamsWoPath>, merge: true): Promise<void>;
  };
  setParams: {
    (params: ParamsWoPath): Promise<void>;
    (params: Partial<ParamsWoPath>, merge: true): Promise<void>;
  };
  getPath: (index: number) => string | undefined;
  setIsEditing: (isEditing: boolean) => void;
  setConfirmLeave: (confirmLeave: () => Promise<boolean>) => void;
};

const defaultState: State = {
  path: '/',
  page: undefined,
  isPush: false,
  isEditing: false,
};

const routerStoreCreator: StateCreator<StoreState> = (set, get) => {
  async function setParams(params: Partial<State>, merge = false) {
    let confirmed = true;
    if (get().isEditing) {
      const confirm = get().confirmLeave;
      if (confirm) confirmed = await confirm();
    }

    if (!confirmed) return;

    if (merge) {
      set((state) => ({ ...state, ...params, isPush: true }));
    } else {
      set(() => ({ ...get(), ...defaultState, ...params, isPush: true }), true);
    }
  }

  return {
    ...defaultState,
    async setPath(path, params, merge = false) {
      setParams({ ...params, path }, merge);
    },
    setParams,
    getPath(index) {
      const path = get().path;
      return path?.split('/').filter((p) => p !== '')[index];
    },
    setIsEditing(isEditing) {
      set({ isEditing });
    },
    setConfirmLeave(confirmLeave) {
      set({ confirmLeave });
    },
  };
};

export const routerStore = createStore(
  persist(routerStoreCreator, {
    name: 'searchParams',
    storage: persistentStorage,
    merge(persistedState, currentState) {
      return { ...currentState, ...(persistedState as State) };
    },
  }),
);

export const useRouterStore = createBoundedUseStore(routerStore);

export const useListenPopState = () => {
  useEffect(() => {
    let lastHref = window.location.href;

    const handlePushState = () => {
      lastHref = window.location.href;
    };

    const handlePopState = async (_event) => {
      const isEditing = routerStore.getState().isEditing;
      if (isEditing) {
        const confirm = routerStore.getState().confirmLeave;
        if (confirm) {
          const confirmed = await confirm();
          if (!confirmed) {
            window.history.pushState(null, '', lastHref);
            return;
          }
        }
      }
      lastHref = window.location.href;
      routerStore.persist.rehydrate();
    };

    window.addEventListener('pushstate', handlePushState);
    window.addEventListener('popstate', handlePopState);

    return () => {
      window.removeEventListener('pushstate', handlePushState);
      window.removeEventListener('popstate', handlePopState);
    };
  }, []);
};
