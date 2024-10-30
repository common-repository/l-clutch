import { useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes }) {
  const { width } = attributes;

  return (
    <div
      {...useBlockProps.save({
        className: attributes.className,
      })}
    >
      <img src="%src%" alt="プロフィール画像" style={{ width, height: width }} />
    </div>
  );
}
