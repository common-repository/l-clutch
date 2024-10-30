import { Schemas } from '@l-clutch/core';
import { Skeleton } from 'antd';

type Props = {
  user?: Schemas['User'] | null;
};

export const LastLoggedInDate = ({ user }: Props) => {
  if (!user?.line_info) return <Skeleton.Input active size="small" />;

  if (!user.line_info?.logged_in_at)
    return (
      <span className="tw-text-gray-500" aria-label="最終ログイン日時">
        未ログイン
      </span>
    );

  const loggedInDate = new Date(user.line_info.logged_in_at);
  return (
    <time dateTime={loggedInDate.toISOString()} aria-label="最終ログイン日時">
      {loggedInDate.toLocaleString()}
    </time>
  );
};
