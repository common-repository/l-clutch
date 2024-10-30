import { FC, ReactNode, useMemo } from 'react';
import { Tooltip } from 'antd';
import { InfoCircleOutlined } from '@ant-design/icons';
import { FieldError, FieldErrorsImpl, GlobalError, Merge } from 'react-hook-form';

type Props = {
  error?: FieldError | Merge<FieldError, FieldErrorsImpl> | (Record<string, GlobalError> & GlobalError) | undefined;
  children?: ReactNode;
  tooltip?: ReactNode;
};

export const ErrorMessage: FC<Props> = ({ children, error = {}, tooltip }) => {
  const messages = useMemo(() => {
    if (!error) return [];

    const _messages: ReactNode[] = flatErrors(error).map((error) => error.message);
    if (children) _messages.push(children);
    return _messages;
  }, [error, children]);

  return (
    <ul>
      {messages.map(
        (message, index) =>
          message && (
            <li key={index} className="tw-text-xs tw-text-red-500 tw-mt-2 first:tw-mt-0">
              {message}
              {index === messages.length - 1 && tooltip && (
                <>
                  {' '}
                  <Tooltip title={tooltip}>
                    <InfoCircleOutlined />
                  </Tooltip>
                </>
              )}
            </li>
          ),
      )}
    </ul>
  );
};

const flatErrors = (
  error: FieldError | Merge<FieldError, FieldErrorsImpl> | (Record<string, GlobalError> & GlobalError),
): FieldError[] => {
  const children = (Object.keys(error) as (keyof FieldError)[])
    .filter((key) => !['message', 'ref', 'root', 'type', 'types'].includes(key))
    .map((key) => error[key])
    .filter((child) => child !== undefined) as (FieldError | Merge<FieldError, FieldErrorsImpl>)[];
  const errors = children.flatMap((error) => error && flatErrors(error));
  if (error.message) errors.push(error as FieldError);
  return errors;
};
