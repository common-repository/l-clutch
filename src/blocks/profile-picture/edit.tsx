import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { store as coreStore } from '@wordpress/core-data';
import { useSelect } from '@wordpress/data';
import { PanelBody, PanelRow } from '@wordpress/components';

import { UnitControl } from '@l-clutch/core/block-editor';

type Attributes = {
  width?: string;
  layout?: {
    justifyContent?: string;
  };
};

type Props = {
  attributes: Attributes;
  setAttributes: (attributes: Attributes) => void;
};

export default function edit({ attributes, setAttributes }: Props) {
  const { width } = attributes;

  const avatar_url = useSelect((select) => {
    const { avatar_urls } = select(coreStore).getCurrentUser();
    return avatar_urls?.[96];
  }, []);

  return (
    <div
      {...useBlockProps({
        className: `is-content-justification-${attributes?.layout?.justifyContent ?? 'center'}`,
      })}
    >
      <InspectorControls>
        <PanelBody title="サイズ" initialOpen={true}>
          <PanelRow>
            <UnitControl
              label="幅"
              onChange={(value) => {
                setAttributes({ ...attributes, width: value });
              }}
              value={width}
            />
          </PanelRow>
        </PanelBody>
      </InspectorControls>
      <img src={avatar_url} alt="プロフィール画像" style={{ width, height: width }} />
    </div>
  );
}
