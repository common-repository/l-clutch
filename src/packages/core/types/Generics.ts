export type UnwrapPromise<T> = T extends Promise<infer U> ? U : T;

// クラスの関数のキーのみの型を取得
export type MethodKeys<T> = {
  [K in keyof T]: T[K] extends (...args: any[]) => any ? K : never;
}[keyof T];

export type ExtractState<S> = S extends { getState: () => infer X } ? X : never;

export type FirstParameter<T> = T extends (arg1: infer U, ...args: any[]) => any ? U : never;
export type IsOptional<T, Func> = Func extends (arg1?: T, ...args: any[]) => any ? true : false;

export type IsUndefined<T> = T extends undefined ? true : false;
export type IsEmptyObject<T> = T extends {} ? (keyof T extends never ? true : false) : false;
