import save from './save';

export default {
  attributes: {
    loginUrl: {
      type: 'string',
      source: 'attribute',
      selector: 'a',
      attribute: 'href',
    },
    text: {
      type: 'string',
      default: 'LINEでログイン',
      source: 'html',
      selector: 'span',
    },
    imageId: {
      type: 'number',
    },
    imageUrl: {
      type: 'string',
      source: 'attribute',
      selector: 'img',
      attribute: 'src',
    },
    imageAlt: {
      type: 'string',
      source: 'attribute',
      selector: 'img',
      attribute: 'alt',
    },
    imageWidth: {
      type: 'string',
    },
    fontSizeStyle: {
      type: 'string',
    },
  },
  supports: {
    align: ['wide', 'full'],
    shadow: true,
    spacing: {
      margin: ['top', 'bottom'],
    },
    layout: {
      allowOrientation: false,
      allowVerticalAlignment: false,
      allowSwitching: false,
      allowInheriting: false,
      default: {
        type: 'flex',
        justifyContent: 'center',
      },
    },
    typography: {
      fontSize: true,
    },
  },
  save,
};
