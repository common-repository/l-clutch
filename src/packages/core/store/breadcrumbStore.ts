import { BreadcrumbItemType } from 'antd/es/breadcrumb/Breadcrumb';
import { StateCreator, create } from 'zustand';

import { routerStore, useRouterStore } from '.';
import { decodeURLParams } from '../utils';

type State = {
  items?: BreadcrumbItemType[];
  set(items: BreadcrumbItemType[]): void;
};

const rootBreadcrumb: BreadcrumbItemType = {
  title: 'L-Clutch',
};

const store: StateCreator<State> = (set, get) => ({
  breadcrumbs: [rootBreadcrumb],
  set: (items) => {
    const { setPath } = routerStore.getState();

    const newBreadcrumbs = items.map((item) => {
      if (item.path === undefined) return item;

      const url = new URL(window.location.href);
      const searchParams = new URLSearchParams();
      searchParams.set('path', item.path);
      searchParams.set('page', 'l-clutch');
      url.search = decodeURLParams(searchParams);

      return {
        ...item,
        href: url.toString(),
        path: undefined,
        onClick: (e) => {
          e.preventDefault();
          setPath(item.path!);
        },
      };
    });

    set({ items: [rootBreadcrumb, ...newBreadcrumbs] });
  },
});

export const useBreadcrumbStore = create(store);
