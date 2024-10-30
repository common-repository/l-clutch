import { __ } from '@wordpress/i18n';
import { useState } from 'react';
import { URLPopover } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
import { keyboardReturn } from '@wordpress/icons';

const InsertFromURLPopover = ({ onChange, onClose, popoverAnchor }) => {
  const [src, setSrc] = useState('');

  return (
    <URLPopover anchor={popoverAnchor} onClose={onClose}>
      <input
        className="block-editor-media-placeholder__url-input-field"
        type="text"
        aria-label={__('URL')}
        placeholder={__('Paste or type URL')}
        onChange={(event) => setSrc(event.target.value)}
        value={src}
      />
      <Button
        className="block-editor-media-placeholder__url-input-submit-button"
        icon={keyboardReturn}
        label={__('Apply')}
        type="submit"
        onClick={() => onChange(src)}
      />
    </URLPopover>
  );
};

export const URLSelectionUI = ({ onChange }) => {
  const [isURLInputVisible, setIsURLInputVisible] = useState(false);

  const openURLInput = () => {
    setIsURLInputVisible(true);
  };
  const closeURLInput = () => {
    setIsURLInputVisible(false);
  };

  // Use internal state instead of a ref to make sure that the component
  // re-renders when the popover's anchor updates.
  const [popoverAnchor, setPopoverAnchor] = useState(null);

  return (
    <div ref={setPopoverAnchor as any}>
      <Button onClick={openURLInput} isPressed={isURLInputVisible}>
        {__('Insert from URL')}
      </Button>
      {isURLInputVisible && (
        <InsertFromURLPopover onChange={onChange} onClose={closeURLInput} popoverAnchor={popoverAnchor} />
      )}
    </div>
  );
};
