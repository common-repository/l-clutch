import { useMemo } from 'react';
import { Skeleton, Tag } from 'antd';

import { Schemas } from '@l-clutch/core';

type Props = {
  lineInfo: Schemas['User']['line_info'] | undefined;
};

export const FollowTag = ({ lineInfo }: Props) => {
  if (!lineInfo) return <Skeleton.Input active size="small" />;

  const [bgClassName, label] = useMemo<[Parameters<typeof Tag>[0]['color'], string]>(() => {
    if (lineInfo.is_blocked) return ['error', 'ブロック'];
    if (lineInfo.friend_flag) return ['success', '追加済'];
    if (lineInfo.friend_flag === false) return ['default', '未追加'];
    return ['default', '未取得'];
  }, [lineInfo?.friend_flag]);

  return (
    <Tag color={bgClassName} aria-label="友だち追加状態">
      {label}
    </Tag>
  );
};
