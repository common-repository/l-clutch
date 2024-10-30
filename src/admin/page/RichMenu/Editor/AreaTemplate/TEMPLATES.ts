import type { DefaultOptionType } from 'antd/es/select';

import { Template } from '.';

export const AREA_TEMPLATES: (DefaultOptionType & { template: Template })[] = [
  {
    label: 'テンプレート1',
    value: 1,
    template: {
      aspectRatio: 1.45,
      height: 2,
      rows: [
        {
          start: 0,
          height: 1,
          width: 3,
          cols: [
            { name: 'メニュー1', start: 0, width: 1 },
            { name: 'メニュー2', start: 1, width: 1 },
            { name: 'メニュー3', start: 2, width: 1 },
          ],
        },
        {
          start: 1,
          height: 1,
          width: 3,
          cols: [
            { name: 'メニュー4', start: 0, width: 1 },
            { name: 'メニュー5', start: 1, width: 1 },
            { name: 'メニュー6', start: 2, width: 1 },
          ],
        },
      ],
    },
  },
  {
    label: 'テンプレート2',
    value: 2,
    template: {
      aspectRatio: 1.45,
      height: 2,
      rows: [
        {
          start: 0,
          height: 1,
          width: 1,
          cols: [{ name: 'メニュー1', start: 0, width: 1 }],
        },
        {
          start: 1,
          height: 1,
          width: 3,
          cols: [
            { name: 'メニュー2', start: 0, width: 1 },
            { name: 'メニュー3', start: 1, width: 1 },
            { name: 'メニュー4', start: 2, width: 1 },
          ],
        },
      ],
    },
  },
  {
    label: 'テンプレート3',
    value: 3,
    template: {
      aspectRatio: 2.9,
      height: 1,
      rows: [
        {
          start: 0,
          height: 1,
          width: 3,
          cols: [
            { name: 'メニュー1', start: 0, width: 1 },
            { name: 'メニュー2', start: 1, width: 1 },
            { name: 'メニュー3', start: 2, width: 1 },
          ],
        },
      ],
    },
  },
];
