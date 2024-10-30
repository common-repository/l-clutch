import useSWR, { SWRConfiguration, useSWRConfig } from 'swr';
import useSWRMutation, { MutationFetcher, SWRMutationConfiguration } from 'swr/mutation';
import { ErrorOption } from 'react-hook-form';

import { SWR_CONFIG, SWR_MUTATION_CONFIG } from '../utils';
import { API, Schemas } from '../types';
import { FullConfiguration } from 'swr/_internal';
import useSWRInfinite from 'swr/infinite';

export const apiConfigParams = {
  basePath: lClutchCoreSettings.apiBase.replace(/\/$/, ''),
  headers: {
    'X-WP-Nonce': lClutchCoreSettings.nonce,
  },
};

type Key = string | string[] | Object | Object[];

export const createUseApi =
  <
    TPath extends keyof API.paths,
    TMethod extends keyof API.paths[TPath] & string,
    TData = ResponseContent<TPath, TMethod, 200>,
  >(
    path: TPath,
    method: TMethod,
    config?: SWRConfiguration<TData> | ((config: FullConfiguration) => SWRConfiguration<TData>),
  ) =>
  (...args: RequestPathParams<TPath, TMethod> extends never ? [] : [RequestPathParams<TPath, TMethod>]) => {
    const fetcher = generateFetcher<TPath, TMethod>(method);
    const fullConfig = useSWRConfig();
    const swrConfig = typeof config === 'function' ? config(fullConfig) : { ...SWR_CONFIG, ...config };
    const pathKey = args?.length ? injectPathParams(path, args[0]) : path;
    return useSWR<TData, ErrorResponse>(pathKey, fetcher, swrConfig);
  };

export const createUseListApi =
  <TPath extends keyof API.paths>(path: TPath) =>
  (request?: RequestQuery<TPath, 'get'>) => {
    const fetcher = generateListFetcher<TPath>();
    const key = createKeyFromPathAndRequest(path, request);
    return useSWR<ListDataByPath<TPath>, ErrorResponse>(key, fetcher, SWR_CONFIG);
  };

export const createUseInfiniteListApi =
  <TPath extends keyof API.paths>(path: TPath) =>
  (request?: Omit<RequestQuery<TPath, 'get'>, 'page'>) => {
    const fetcher = generateListFetcher<TPath>();
    type Data = ListDataByPath<TPath>;
    const getKey = (index: number, previousPageData: Data | null) => {
      if (previousPageData && index >= previousPageData.pages) return null;
      return createKeyFromPathAndRequest(path, { ...(request ?? {}), page: index + 1 } as RequestQuery<TPath, 'get'>);
    };

    const infinite = useSWRInfinite<ListDataByPath<TPath>, ErrorResponse>(getKey, fetcher, SWR_CONFIG);

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

const createKeyFromPathAndRequest = <TPath extends keyof API.paths>(
  path: TPath,
  request?: RequestQuery<TPath, 'get'>,
) => {
  const search = new URLSearchParams(request).toString();
  return search ? `${path}?${search}` : path;
};

const injectPathParams = <TPath extends keyof API.paths, TMethod extends keyof API.paths[TPath]>(
  path: TPath,
  params: RequestPathParams<TPath, TMethod>,
) => {
  let newPath: string = path;
  for (const key in params) {
    newPath = newPath.replace(`{${key}}`, params[key]);
  }
  return newPath;
};

export const createUseMutateApi =
  <
    TPath extends keyof API.paths,
    TMethod extends keyof API.paths[TPath] & string,
    TData = ResponseContent<TPath, TMethod, 200>,
    TRequestBody = RequestBody<TPath, TMethod>,
  >(
    path: TPath,
    method: TMethod,
    config?:
      | SWRMutationConfiguration<TData, any>
      | ((config: FullConfiguration<TData>) => SWRMutationConfiguration<TData, any>),
  ) =>
  (...args: RequestPathParams<TPath, TMethod> extends never ? [] : [RequestPathParams<TPath, TMethod>]) => {
    const fetcher = (path, { arg }) => {
      const body = arg ? JSON.stringify(arg) : undefined;
      return generateFetcher<TPath, TMethod>(method)(path, body);
    };

    const fullConfig = useSWRConfig();
    const mutationOptions = typeof config === 'function' ? config(fullConfig) : { ...SWR_MUTATION_CONFIG, ...config };

    const pathKey = args?.length ? injectPathParams(path, args[0]) : path;

    return useSWRMutation<TData, ErrorResponse, Key, TRequestBody>(
      pathKey,
      fetcher as MutationFetcher<TData, TPath, TRequestBody>,
      mutationOptions as SWRMutationConfiguration<TData, any>,
    );
  };

const fetchByKey = async (key: string, init: RequestInit) => {
  const [path, search] = key.split('?');
  const url = new URL(apiConfigParams.basePath + path);
  if (search) {
    const params = new URLSearchParams(search);
    params.forEach((value, key) => {
      url.searchParams.append(key, value);
    });
  }
  const response = await fetch(url.href, init);

  if (!response.ok) {
    const body = (await response.json()) as ErrorResponse;
    const error =
      body.code === 'invalid_body' && body.data
        ? new ApiValidationError(body.code, body.data)
        : new Error(body.message);
    throw error;
  }

  return response;
};

export const generateFetcher =
  <TPath extends keyof API.paths, TMethod extends keyof API.paths[TPath] & string>(
    method: TMethod,
    namespace = '/l-clutch/v1',
  ) =>
  async (key: Key, body?: string) => {
    const response = await fetchByKey(namespace + key, {
      method: method.toUpperCase(),
      headers: apiConfigParams.headers,
      body,
    });
    return response.json() as Promise<ResponseContent<TPath, TMethod, 200>>;
  };

export const generateListFetcher =
  <TPath extends keyof API.paths>(namespace = '/l-clutch/v1') =>
  async (key: Key) => {
    const response = await fetchByKey(namespace + key, {
      headers: apiConfigParams.headers,
    });
    const items = (await response.json()) as ResponseContent<TPath, 'get', 200>;
    const pages = Number(response.headers.get('X-WP-TotalPages'));
    const total = Number(response.headers.get('X-WP-Total'));

    return { items, pages, total };
  };

export class ApiValidationError extends Error {
  public code: string;
  public data: Record<string, [ErrorOption]>;

  constructor(code: string, data: Record<string, [ErrorOption]>) {
    super('Validation error');
    this.code = code;
    this.data = data;
  }
}

export type ResponseContent<
  TPath extends keyof API.paths,
  TMethod extends keyof API.paths[TPath],
  TStatus extends number,
> = API.paths[TPath][TMethod] extends { responses: infer TResponses }
  ? TResponses extends { [K in TStatus]: infer TResponse }
    ? TResponse extends { content: infer TContent }
      ? TContent extends { 'application/json': infer TJson }
        ? TJson
        : never
      : never
    : never
  : never;

type ResponseHeaders<
  TPath extends keyof API.paths,
  TMethod extends keyof API.paths[TPath],
  TStatus extends number,
> = API.paths[TPath][TMethod] extends { responses: infer TResponses }
  ? TResponses extends { [K in TStatus]: infer TResponse }
    ? TResponse extends { headers: infer THeaders }
      ? THeaders
      : never
    : never
  : never;

type RequestQuery<
  TPath extends keyof API.paths,
  TMethod extends keyof API.paths[TPath],
> = API.paths[TPath][TMethod] extends { parameters?: infer TParameters }
  ? TParameters extends { query?: infer TQuery }
    ? TQuery extends Record<string, unknown>
      ? TQuery
      : never
    : never
  : never;

type RequestBody<
  TPath extends keyof API.paths,
  TMethod extends keyof API.paths[TPath],
> = API.paths[TPath][TMethod] extends { requestBody: infer TRequestBody }
  ? TRequestBody extends { content: infer TContent }
    ? TContent extends { 'application/json': infer TJson }
      ? TJson
      : never
    : never
  : never;

type RequestPathParams<
  TPath extends keyof API.paths,
  TMethod extends keyof API.paths[TPath],
> = API.paths[TPath][TMethod] extends { parameters?: infer TParameters }
  ? TParameters extends { path?: infer TPathParams }
    ? TPathParams extends Record<string, unknown>
      ? TPathParams
      : never
    : never
  : never;

type ListData<TData> = {
  items: TData;
  pages: number;
  total: number;
};

type ErrorResponse = Schemas['ErrorResponse'];

export type ListDataByPath<TPath extends keyof API.paths> = ListData<ResponseContent<TPath, 'get', 200>>;
