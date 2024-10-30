import useSWR from 'swr';

import { API, SWR_CONFIG, Schemas } from '..';
import { ListDataByPath, generateListFetcher } from './createApiStore';

export const useSearch = (params: API.paths['~/wp/v2/search']['get']['parameters']['query'] | undefined) => {
  type Path = '~/wp/v2/search';

  const fetchMediaList = generateListFetcher<Path>('/wp/v2');

  let path: string | undefined;
  if (params) {
    const search = new URLSearchParams();
    Object.keys(params).forEach((key, value) => {
      if (value) search.set(key, value.toString());
    });
    path = `/search?${search.toString()}`;
  }

  return useSWR<ListDataByPath<Path>, Schemas['ErrorResponse']>(path, fetchMediaList, SWR_CONFIG);
};
