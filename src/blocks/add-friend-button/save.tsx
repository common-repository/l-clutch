import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
  const content = attributes.imageUrl ? (
    <img
      src={attributes.imageUrl}
      alt={attributes.imageAlt}
      className="image"
      style={{ width: attributes.imageWidth }}
    />
  ) : (
    <RichText.Content tagName="span" value={attributes.text} className="text" />
  );

  return (
    <div {...useBlockProps.save()}>
      <a
        href="#addFriendUrl"
        target="_blank"
        rel="noopener noreferrer"
        className={attributes.imageUrl ? 'image-button' : 'text-button'}
      >
        {content}
      </a>
    </div>
  );
}
