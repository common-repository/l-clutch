import {
  useBlockProps,
  RichText,
  BlockControls,
  InspectorControls,
  MediaReplaceFlow,
  MediaUpload,
  MediaUploadCheck,
} from '@wordpress/block-editor';
import { PanelBody, Button, PanelRow } from '@wordpress/components';

import { URLSelectionUI, UnitControl } from '@l-clutch/core/block-editor';

const ALLOWED_MEDIA_TYPES = ['image'];

export default function edit({ attributes, setAttributes }) {
  const onChangeText = (newText) => {
    newText = newText.replace(/(\r?\n)|(<br\/?>)/g, ' ');
    setAttributes({ ...attributes, text: newText });
  };

  return (
    <div
      {...useBlockProps({
        className: `is-content-justification-${attributes?.layout?.justifyContent ?? 'center'}`,
      })}
    >
      <BlockControls group="other">
        {attributes.imageUrl ? (
          <>
            <MediaReplaceFlow
              mediaId={attributes.imageId}
              mediaURL={attributes.imageUrl}
              allowedTypes={ALLOWED_MEDIA_TYPES}
              accept="image/*"
              onSelect={(image) =>
                setAttributes({ ...attributes, imageId: image.id, imageUrl: image.url, imageAlt: image.alt })
              }
              onSelectURL={(image) => {
                setAttributes({ ...attributes, imageUrl: image });
              }}
              onError={() => {}}
            />
            <Button onClick={() => setAttributes({ ...attributes, imageId: null, imageUrl: null, imageAlt: null })}>
              画像を削除
            </Button>
          </>
        ) : (
          <>
            <MediaUploadCheck>
              <MediaUpload
                onSelect={(image) =>
                  setAttributes({ ...attributes, imageId: image.id, imageUrl: image.url, imageAlt: image.alt })
                }
                allowedTypes={ALLOWED_MEDIA_TYPES}
                value={attributes.imageId}
                render={({ open }) => <Button onClick={open}>画像を選択</Button>}
              />
            </MediaUploadCheck>
            <URLSelectionUI onChange={(src) => setAttributes({ ...attributes, imageUrl: src })} />
          </>
        )}
      </BlockControls>
      {attributes.imageUrl && (
        <InspectorControls>
          <PanelBody title="サイズ" initialOpen={true}>
            <PanelRow>
              <UnitControl
                label="画像の幅"
                onChange={(value) => setAttributes({ ...attributes, imageWidth: value })}
                value={attributes.imageWidth}
              />
            </PanelRow>
          </PanelBody>
        </InspectorControls>
      )}

      <button className={attributes.imageUrl ? 'image-button' : 'text-button'} style={{ cursor: 'inherit' }}>
        {attributes.imageUrl ? (
          <img
            src={attributes.imageUrl}
            alt={attributes.imageAlt}
            className="image"
            style={{ width: attributes.imageWidth }}
          />
        ) : (
          <RichText
            onChange={onChangeText}
            value={attributes.text}
            withoutInteractiveFormatting
            className="text"
            identifier="text"
          />
        )}
      </button>
    </div>
  );
}
