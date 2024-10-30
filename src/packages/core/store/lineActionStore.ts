import { createStore } from 'zustand/vanilla';

import { LineActionType } from '../types';
import { createBoundedUseStore } from '../utils';
import { MessageActionField, RichMenuSwitchActionField, UriActionField } from './LineActionFields';

interface LineActionStore {
  types: Record<string, LineActionType>;
  add: (key, type: LineActionType) => void;
  remove: (key) => void;
  clear: () => void;
}

export const lineActionStore = createStore<LineActionStore>()((set) => ({
  types: {
    message: {
      label: 'メッセージ',
      Field: MessageActionField,
    },
    richmenuswitch: {
      label: 'リッチメニュー切替',
      Field: RichMenuSwitchActionField,
    },
    uri: {
      label: 'URL',
      Field: UriActionField,
    },
  },
  add: (key, type) => {
    return set((state) => {
      if (Object.keys(state.types).includes(key)) {
        console.error('Type "' + key + '" is already registered.');
        return state;
      }
      return { types: { ...state.types, [key]: type } };
    });
  },
  remove: (key) =>
    set((state) => {
      const { [key]: _, ...rest } = state.types;
      return { types: rest };
    }),
  clear: () => set({ types: {} }),
}));

export const useLineActionStore = createBoundedUseStore(lineActionStore);
