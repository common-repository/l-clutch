export const divideProperties = (target: Record<string, any>, filter: (key: string) => boolean) =>
  Object.keys(target).reduce(
    (acc, key) => {
      if (filter(key)) {
        acc.filtered[key] = target[key];
      } else {
        acc.rest[key] = target[key];
      }
      return acc;
    },
    { filtered: {}, rest: {} },
  );
