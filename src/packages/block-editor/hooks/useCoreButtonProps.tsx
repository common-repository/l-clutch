import { useBlockProps } from '@wordpress/block-editor';
import classnames from 'classnames';

import { divideProperties } from '@l-clutch/core';

const useProps = ({ attributes, isSave = false }) => {
  const blockProps = isSave
    ? useBlockProps.save()
    : useBlockProps({
        className: `is-content-justification-${attributes?.layout?.justifyContent ?? 'center'}`,
      });

  const { filtered: marginStyle, rest: restStyle } = divideProperties(blockProps.style ?? {}, (key) =>
    key.startsWith('margin'),
  );

  const wrapperClasses = classnames(
    'wp-block-button',
    blockProps?.className?.split(' ')?.find((className) => className.startsWith('is-style-')) ?? 'is-style-outline',
  );

  const [rootClasses, buttonClasses] = blockProps?.className?.split(' ').reduce(
    (acc, className) => {
      if (className.includes('color') || className.includes('background')) {
        acc[1].push(className);
      } else {
        acc[0].push(className);
      }
      return acc;
    },
    [[], []],
  ) ?? [[], []];

  return {
    blockProps: {
      ...blockProps,
      style: marginStyle,
      className: rootClasses.join(' '),
    },
    wrapperProps: {
      className: wrapperClasses,
    },
    buttonProps: {
      className: classnames('wp-block-button__link', buttonClasses, 'wp-element-button'),
      style: restStyle,
    },
  };
};

const useCoreButtonProps = ({ attributes }) => {
  return useProps({ attributes });
};
useCoreButtonProps.save = ({ attributes }) => {
  return useProps({ attributes, isSave: true });
};

export { useCoreButtonProps };
