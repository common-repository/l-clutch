import { createStore } from 'zustand/vanilla';

import { createBoundedUseStore } from '../utils';
import { TabsProps } from 'antd';

export type Tab = NonNullable<TabsProps['items']>[number] & {
  order?: number;
};

interface SettingTabStore {
  tabs: Tab[];
  add: (tab: Tab) => void;
  remove: (tab: Tab) => void;
  clear: () => void;
}

export const settingTabStore = createStore<SettingTabStore>()((set) => ({
  tabs: [],
  add: (tab) => {
    return set((state) => {
      if (state.tabs.some((t) => t.key === tab.key)) {
        console.error('Setting tab key "' + tab.key + '" is already registered.');
        return state;
      }

      let index = state.tabs.length;
      if (tab.order !== undefined) {
        const found = state.tabs.findIndex((t) => (t.order ?? 9999) > tab.order!);
        if (found !== -1) index = found;
      }
      state.tabs.splice(index, 0, tab);
      return { tabs: state.tabs };
    });
  },
  remove: (tab) => set((state) => ({ tabs: state.tabs.filter((t) => t !== tab) })),
  clear: () => set({ tabs: [] }),
}));

export const useSettingTabStore = createBoundedUseStore(settingTabStore);

export const registerSettingTab = (tab: Tab) => {
  const { getState } = settingTabStore;
  getState().add(tab);
};
