import { Path, UseFormSetError } from 'react-hook-form';
import { ApiValidationError } from '..';

export const useOnSubmitCatchError =
  <FieldValues extends Record<string, any>>(
    callback: (values: FieldValues) => Promise<void>,
    setError: UseFormSetError<FieldValues>,
  ) =>
  async (values: FieldValues) => {
    try {
      await callback(values);
    } catch (e) {
      if (e instanceof ApiValidationError) {
        Object.entries(e.data).forEach(([key, value]) => {
          for (const error of value) {
            setError(key as Path<FieldValues>, error);
          }
        });
      } else if (e instanceof Error) {
        setError('root', { message: e.message });
      } else {
        setError('root', { message: 'Unknown error' });
      }
    }
  };
