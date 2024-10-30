import useSWR from 'swr';

import { ListDataByPath, ResponseContent, generateFetcher, generateListFetcher } from './createApiStore';
import { API, SWR_CONFIG, Schemas } from '..';

export const useUser = (id: number) => {
  type Path = '~/wp/v2/users/{id}';
  type Method = 'get';
  const path = `/users/${id}`;
  const fetchUser = generateFetcher<Path, Method>('get', '/wp/v2');

  return useSWR<ResponseContent<Path, Method, 200>>(path, fetchUser, SWR_CONFIG);
};

export const useUserList = (request: API.paths['~/wp/v2/users']['get']['parameters']['query']) => {
  type Path = '~/wp/v2/users';

  const fetchUserList = generateListFetcher<Path>('/wp/v2');

  const search = new URLSearchParams();
  search.set('roles', 'l-clutch_line-user');
  if (request?.page !== undefined) {
    search.set('page', request.page.toString());
  }
  if (request?.per_page !== undefined) {
    search.set('per_page', request.per_page.toString());
  }

  const path = `/users?${search.toString()}`;

  return useSWR<ListDataByPath<Path>, Schemas['ErrorResponse']>(path, fetchUserList, SWR_CONFIG);
};
