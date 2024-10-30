import { useCallback, useEffect, useMemo, useRef, useState } from 'react';
import { Popover } from 'antd';
import { useFormContext } from 'react-hook-form';
import { Rnd } from 'react-rnd';

import { FormValues } from '.';
import { BoundsEditor } from './BoundsEditor';
import { useSelectAction } from './useSelectAction';

type Props = {
  showActionArea: boolean;
};

export const BackgroundEditor = ({ showActionArea }: Props) => {
  const {
    watch,
    setValue,
    formState: { errors },
  } = useFormContext<FormValues>();

  const background = watch('background');
  const [selectedIndex, setSelected] = useSelectAction((select) => [select.index, select.setIndex]);
  const areas = watch('areas');

  const selectedArea = useMemo(() => {
    if (selectedIndex === undefined) return undefined;
    else return areas?.[selectedIndex];
  }, [areas, selectedIndex]);

  const imgRef = useRef<HTMLImageElement>(null);
  const backgroundRef = useRef<HTMLDivElement>(null);
  const prevBackground = useRef<FormValues['background'] | undefined>(undefined);
  const resizeObserver = useRef<ResizeObserver | null>(null);
  const [zoom, setZoom] = useState(1);

  useEffect(() => {
    if (imgRef.current === null) return;
    if (background === undefined) return;

    resizeObserver.current = new ResizeObserver((_entries) => {
      if (imgRef.current === null) return;
      setZoom(imgRef.current.clientWidth / background.width);
    });
    resizeObserver.current.observe(imgRef.current);

    if (prevBackground.current) {
      // 画像が変更されたらそれぞれのアクションの位置とサイズを変更する
      const widthRatio = background.width / prevBackground.current.width;
      const heightRatio = background.height / prevBackground.current.height;
      areas?.forEach((area, index) => {
        setValue(`areas.${index}.bounds.x`, Math.round(area.bounds.x * widthRatio), { shouldDirty: true });
        setValue(`areas.${index}.bounds.y`, Math.round(area.bounds.y * heightRatio), { shouldDirty: true });
        setValue(`areas.${index}.bounds.width`, Math.round(area.bounds.width * widthRatio), { shouldDirty: true });
        setValue(`areas.${index}.bounds.height`, Math.round(area.bounds.height * heightRatio), { shouldDirty: true });
      });
    } else {
      // はみ出したら変更する
      areas?.forEach((area, index) => {
        if (area.bounds.x < 0) setValue(`areas.${index}.bounds.x`, 0, { shouldDirty: true });
        if (area.bounds.y < 0) setValue(`areas.${index}.bounds.y`, 0, { shouldDirty: true });
        if (area.bounds.x + area.bounds.width > background.width) {
          setValue(`areas.${index}.bounds.width`, background.width - area.bounds.x, { shouldDirty: true });
        }
        if (area.bounds.y + area.bounds.height > background.height) {
          setValue(`areas.${index}.bounds.height`, background.height - area.bounds.y, { shouldDirty: true });
        }
      });
    }
    prevBackground.current = background;

    return () => resizeObserver.current?.disconnect();
  }, [background]);

  const handleDrag = useCallback(
    (index: number, position: { x: number; y: number }) => {
      let x = Math.round(position.x / zoom);
      let y = Math.round(position.y / zoom);
      if (x < 0) x = 0;
      if (y < 0) y = 0;
      if (!background || !selectedArea) return;
      if (x + selectedArea.bounds.width > background.width) x = background.width - selectedArea.bounds.width;
      if (y + selectedArea.bounds.height > background.height) y = background.height - selectedArea.bounds.height;
      setValue(`areas.${index}.bounds.x`, x, { shouldDirty: true });
      setValue(`areas.${index}.bounds.y`, y, { shouldDirty: true });
    },
    [zoom, setValue, background, selectedArea],
  );

  const handleResize = useCallback(
    (index: number, size: { width: number; height: number }, position: { x: number; y: number }) => {
      const x = Math.round(position.x / zoom);
      const y = Math.round(position.y / zoom);
      let width = Math.round(size.width / zoom);
      let height = Math.round(size.height / zoom);
      if (!background || !selectedArea) return;
      if (width > background.width - x) width = background.width - x;
      if (height > background.height - y) height = background.height - y;
      setValue(`areas.${index}.bounds.x`, x, { shouldDirty: true });
      setValue(`areas.${index}.bounds.y`, y, { shouldDirty: true });
      setValue(`areas.${index}.bounds.width`, width, { shouldDirty: true });
      setValue(`areas.${index}.bounds.height`, height, { shouldDirty: true });
    },
    [zoom, setValue, background, selectedArea],
  );

  return (
    <div
      className="tw-w-full tw-flex tw-justify-center tw-items-center tw-border tw-border-solid tw-border-gray-400 tw-relative tw-box-border"
      style={{
        paddingTop: background ? `calc(100% / ${background?.width} * ${background?.height})` : '60%',
      }}
      ref={backgroundRef}
    >
      <>
        {background?.url && (
          <img
            src={background.url}
            className="tw-w-full tw-h-full tw-absolute tw-top-0 tw-left-0 tw-object-cover tw-pointer-events-none"
            ref={imgRef}
            aria-label="背景画像"
          />
        )}

        {background &&
          showActionArea &&
          areas?.map((area, index) => {
            if (index === selectedIndex && selectedArea) {
              return (
                <Rnd
                  key={`area-${index}`}
                  size={{
                    width: selectedArea.bounds.width * zoom,
                    height: selectedArea.bounds.height * zoom,
                  }}
                  position={{ x: selectedArea.bounds.x * zoom, y: selectedArea.bounds.y * zoom }}
                  bounds={backgroundRef.current as Element}
                  onDragStop={(e, data) => handleDrag(index, data)}
                  onResizeStop={(_event, _direction, element, _delta, position) =>
                    handleResize(index, { width: element.clientWidth, height: element.clientHeight }, position)
                  }
                >
                  <Popover content={<BoundsEditor {...{ bounds: selectedArea.bounds, background, index }} />}>
                    <div
                      className={
                        'tw-border-4 tw-border-solid tw-grid tw-place-items-center tw-w-full tw-h-full tw-bg-opacity-50 tw-box-border' +
                        (errors.areas?.[index]?.bounds
                          ? ' tw-border-red-600 tw-bg-red-200'
                          : ' tw-border-blue-400 tw-bg-blue-300')
                      }
                    >
                      {selectedArea.action.label}
                    </div>
                  </Popover>
                </Rnd>
              );
            } else {
              return (
                <div
                  key={`area-${index}`}
                  className={['tw-absolute tw-opacity-50', index === selectedIndex ? 'tw-z-10' : ''].join(' ')}
                  style={{
                    top: `${(area.bounds.y / (background.height ?? 1724)) * 100}%`,
                    left: `${(area.bounds.x / (background.width ?? 2500)) * 100}%`,
                  }}
                >
                  {index !== selectedIndex && (
                    <div
                      className={[
                        'tw-outline-2 tw-outline-solid tw-grid tw-place-items-center tw-w-full tw-h-full',
                        errors.areas?.[index]?.bounds
                          ? 'tw-outline-red-600 tw-bg-red-200'
                          : 'tw-outline-gray-400 tw-bg-gray-200',
                      ].join(' ')}
                      style={{
                        width: `${area.bounds.width * zoom}px`,
                        height: `${area.bounds.height * zoom}px`,
                      }}
                      onClick={() => {
                        setSelected(index);
                      }}
                    >
                      {area.action?.label}
                    </div>
                  )}
                </div>
              );
            }
          })}
      </>
    </div>
  );
};
