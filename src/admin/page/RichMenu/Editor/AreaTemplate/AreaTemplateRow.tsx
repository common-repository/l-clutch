import classNames from 'classnames';
import { FC, useMemo } from 'react';

import { Schemas } from '@l-clutch/core';

type AreaTemplateRowProps = {
  row: TemplateRow;
  templateHeight: number;
  setBounds?: (ratioBounds: Schemas['RichMenuBounds']) => void;
};

export const AreaTemplateRow: FC<AreaTemplateRowProps> = ({ row, templateHeight, setBounds }) => {
  const gridTemplateColumns = useMemo(() => `repeat(${row.width}, 1fr)`, [row]);

  return (
    <div
      className="tw-grid tw-grid-flow-col"
      style={{
        gridRowStart: row.start + 1,
        gridRowEnd: row.start + row.height + 1,
        gridTemplateColumns,
      }}
    >
      {row.cols.map((col, index) => (
        <div
          className={classNames(
            'tw-grid tw-place-items-center tw-text-center tw-box-border tw-border tw-border-solid tw-border-blue-400 tw-bg-blue-300',
            setBounds && 'tw-cursor-pointer hover:tw-bg-blue-400 hover:tw-text-white tw-transition-colors',
          )}
          style={{
            gridColumnStart: col.start + 1,
            gridColumnEnd: col.start + col.width + 1,
          }}
          key={index}
          onClick={() =>
            setBounds?.({
              x: col.start / row.width,
              width: col.width / row.width,
              y: row.start / templateHeight,
              height: row.height / templateHeight,
            })
          }
        >
          {col.name}
        </div>
      ))}
    </div>
  );
};

export type TemplateRow = {
  start: number;
  height: number;
  width: number;
  cols: TemplateCol[];
};

type TemplateCol = {
  name: string;
  start: number;
  width: number;
};
