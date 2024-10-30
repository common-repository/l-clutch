import { SWRConfiguration } from 'swr';
import { SWRMutationConfiguration } from 'swr/mutation';

export const SWR_CONFIG: SWRConfiguration = {
  revalidateOnFocus: false,
};

export const SWR_MUTATION_CONFIG: SWRMutationConfiguration<any, any> = {
  populateCache: true,
  revalidate: false,
};
