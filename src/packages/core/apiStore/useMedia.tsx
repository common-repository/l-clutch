import useSWRInfinite from 'swr/infinite';

import { apiConfigParams } from './createApiStore';
import { Media, MediaList, MediaListRequest } from '..';
import { SWR_CONFIG } from '../utils';

async function fetcher([_, request]: [string, MediaListRequest]): Promise<MediaList> {
  const url = new URL(apiConfigParams.basePath);
  url.searchParams.set('rest_route', `/wp/v2/media`);
  url.searchParams.set('media_type', request.media_type);
  url.searchParams.set('page', request.page.toString());
  url.searchParams.set('per_page', request.per_page.toString());

  const response = await fetch(url, { headers: apiConfigParams.headers });
  if (!response.ok) throw new Error('エラーが発生しました。');

  const items = (await response.json()) as Media[];
  if (!items) throw new Error('エラーが発生しました。');

  const pages = Number(response.headers.get('X-WP-TotalPages'));
  const total = Number(response.headers.get('X-WP-Total'));

  return { items, pages, total };
}

export const useInfiniteMediaList = (request: Omit<MediaListRequest, 'page'>) => {
  const getKey = (page: number, data: MediaList | null) => {
    if (data && page >= data.pages) return null;
    return ['mediaList', { ...request, page: page + 1 }];
  };

  const infinite = useSWRInfinite<MediaList>(getKey, fetcher, SWR_CONFIG);

  const data = {
    ...infinite.data?.slice(-1)[0],
    items: infinite.data?.map((data) => data?.items).flat() ?? [],
  };

  const hasNext = (data && data.items.length !== undefined && data.total && data.items.length < data.total) || false;

  const next = () => {
    if (!hasNext) return;
    infinite.setSize(infinite.size + 1);
  };

  return { ...infinite, hasNext, next, data };
};
