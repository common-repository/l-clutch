import { Cache } from 'swr';
import {
  ListDataByPath,
  createUseApi,
  createUseInfiniteListApi,
  createUseListApi,
  createUseMutateApi,
} from './createApiStore';

export const useRichMenuList = createUseListApi('/rich-menu');
export const useInfiniteRichMenuList = createUseInfiniteListApi('/rich-menu');

export const useDefaultRichMenu = createUseApi('/rich-menu/default', 'get');
export const useUpdateDefaultRichMenu = createUseMutateApi('/rich-menu/default', 'post');

export const useRichMenu = createUseApi('/rich-menu/{id}', 'get', ({ mutate }) => ({
  onError(_err, key) {
    mutate(key, null, { revalidate: false });
  },
}));

export const useLazyRichMenu = createUseMutateApi('/rich-menu/{id}', 'get', ({ mutate }) => ({
  onError(_err, key) {
    mutate(key, null, { revalidate: false });
  },
}));

export const useUpdateRichMenu = createUseMutateApi('/rich-menu/{id}', 'put', ({ cache, mutate }) => ({
  populateCache(result, currentData) {
    if (result.status !== currentData?.status) {
      mutate<RichMenuList>(isHasStatusRichMenuList, undefined);
      mutateDefaultRichMenuIfIdMatched(cache, result.id, mutate);
    }

    // リストのアイテムを更新する
    mutate<RichMenuList>(
      (key) => isRichMenuList(key),
      async (data) => {
        if (!data) return;
        const items = [...data.items];
        const index = items.findIndex((item) => item.id === result.id);
        if (index === -1) return data;
        items[index] = result;
        return { ...data, items };
      },
      { revalidate: false },
    );

    return result;
  },
}));

export const useCreateRichMenu = createUseMutateApi('/rich-menu', 'post', ({ mutate }) => ({
  onSuccess(result) {
    mutate(`/rich-menu/${result.id}`, result, { revalidate: false });
    mutate<RichMenuList>((key) => isStatusMatchedRichMenuList(key, result.status), undefined);
  },
}));

export const useDeleteRichMenu = createUseMutateApi('/rich-menu/{id}', 'delete', ({ cache, mutate }) => ({
  onSuccess(result) {
    mutate(`/rich-menu/${result.id}`, undefined, { revalidate: false });
    mutate<RichMenuList>((key) => isStatusMatchedRichMenuList(key, result.status), undefined);
    mutateDefaultRichMenuIfIdMatched(cache, result.id, mutate);
  },
}));

type RichMenuList = ListDataByPath<'/rich-menu'>;
const isRichMenuList = (key: unknown): key is string =>
  typeof key === 'string' && !!key.match(/\/rich-menu(?!\/)(&.+)?/);

const mutateDefaultRichMenuIfIdMatched = (cache: Cache, id: number, mutate: (key: string, data?: any) => void) => {
  const defaultRichMenu = cache.get('/rich-menu/default');
  if (defaultRichMenu?.data?.id === id) {
    mutate('/rich-menu/default', undefined);
  }
};

const isStatusMatchedRichMenuList = (key: unknown, status: string) => {
  if (!isRichMenuList(key)) return false;
  const search = new URLSearchParams(key);
  return !search.has('status') || search.get('status') === status;
};

const isHasStatusRichMenuList = (key: unknown) => {
  if (!isRichMenuList(key)) return false;
  const search = new URLSearchParams(key);
  return search.has('status');
};
