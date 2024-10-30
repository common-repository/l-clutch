import { useEffect } from 'react';
import { create } from 'zustand';
import { App } from 'antd';

import { useLoginChannel, useMessagingChannel, useRouterStore } from '..';

type Channel = 'loginChannel' | 'messagingChannel';

type State = {
  loginChannel: Set<string>;
  messagingChannel: Set<string>;
  setCompleted: (channel: Channel, key: string) => void;
};

const useStore = create<State>((_, get) => ({
  loginChannel: new Set(),
  messagingChannel: new Set(),
  setCompleted(channel: Channel, key: string) {
    const state = get();
    state[channel].add(key);
  },
}));

type Props = {
  content: string;
  key: string;
};

export const useCheckLoginChannel = ({ content, key }: Props) => {
  const { data } = useLoginChannel();
  useCheckChannel({
    title: 'LINEログインチャネルが未設定です',
    content,
    isValid: data?.is_valid,
    channel: 'loginChannel',
    key,
  });
};

export const useCheckMessagingChannel = ({ content, key }: Props) => {
  const { data } = useMessagingChannel();
  useCheckChannel({
    title: 'LINE Messaging APIチャネルが未設定です',
    content,
    isValid: data?.is_valid,
    channel: 'messagingChannel',
    key,
  });
};

type CheckChannelProps = {
  title: string;
  content: string;
  isValid: boolean | undefined;
  channel: Channel;
  key: string;
};

const useCheckChannel = ({ title, content, isValid, channel, key }: CheckChannelProps) => {
  const { modal } = App.useApp();
  const { setPath } = useRouterStore();
  const completed = useStore((state) => state[channel].has(key));
  const setCompleted = useStore((state) => state.setCompleted);

  useEffect(() => {
    if (!completed && isValid === false) {
      modal.warning({
        title,
        content,
        closable: true,
        okText: '設定画面を開く',
        onOk: () => setPath('/setting/line-connection'),
        okCancel: true,
        cancelText: '閉じる',
      });
      setCompleted(channel, key);
    }
  }, [isValid]);
};
