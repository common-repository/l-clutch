import { message } from 'antd';

export const copyToClipBoard = (element: HTMLElement | null) => {
  try {
    if (!element) {
      message.error('コピーの対象が見つかりませんでした');
      return false;
    }

    if (element.tagName === 'INPUT') {
      (element as HTMLInputElement).select();
    } else {
      document.getSelection()?.selectAllChildren(element);
    }
    document.execCommand('copy');
    document.getSelection()?.removeAllRanges();
    message.success('コピーしました');
    return true;
  } catch (e) {
    message.error('コピーに失敗しました');
    return false;
  }
};
