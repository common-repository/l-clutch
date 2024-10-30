import { SelectControl, TextControl } from '@wordpress/components';
import { useEffect, useState } from 'react';

const UNITS = ['px', '%', 'em', 'rem', 'vw', 'vh'];

type Props = {
  label: string;
  value: string | undefined;
  onChange: (value: string) => void;
};

export const UnitControl = ({ label, value, onChange }: Props) => {
  const [number, setNumber] = useState(value?.match(/\d+/)?.[0] || '');
  const [unit, setUnit] = useState(value?.match(/(px|%|em|rem|vw|vh)/)?.[0] || 'px');

  useEffect(() => {
    onChange(`${number}${unit}`);
  }, [number, unit]);

  return (
    <div className="tw-flex tw-items-center tw-gap-2">
      <TextControl type="number" label={label} value={number} onChange={setNumber} className="!tw-mb-5" />
      <SelectControl onChange={setUnit} value={unit} options={UNITS.map((unit) => ({ label: unit, value: unit }))} />
    </div>
  );
};
