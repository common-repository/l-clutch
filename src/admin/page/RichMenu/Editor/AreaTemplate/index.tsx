import { FC, useMemo } from 'react';

import { Schemas } from '@l-clutch/core';

import { AreaTemplateRow, TemplateRow } from './AreaTemplateRow';

type AreaTemplateProps = {
  template: Template;
  setBounds?: (ratioBounds: Schemas['RichMenuBounds']) => void;
};

export const AreaTemplate: FC<AreaTemplateProps> = ({ template, setBounds }) => {
  const gridTemplateRows = useMemo(() => `repeat(${template.height}, 1fr)`, [template]);

  return (
    <div
      className="tw-grid tw-w-full tw-border-2 tw-border-solid tw-border-neutral-500 tw-bg-neutral-300 tw-mb-2 -tw-mx-px"
      style={{
        gridTemplateRows,
        aspectRatio: template.aspectRatio,
      }}
    >
      {template.rows.map((row, index) => (
        <AreaTemplateRow row={row} templateHeight={template.height} setBounds={setBounds} key={index} />
      ))}
    </div>
  );
};

export type Template = {
  aspectRatio: number;
  height: number;
  rows: TemplateRow[];
};

export * from './TEMPLATES';
export * from './AreaTemplateSelectModal';
