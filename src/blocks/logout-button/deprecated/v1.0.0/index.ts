import save from './save';

export default {
  attributes: {
    text: {
      type: 'string',
      default: 'ログアウト',
      source: 'html',
      selector: 'a',
    },
    borderColor: {
      type: 'string',
    },
  },
  supports: {
    align: ['wide', 'full'],
    color: {
      gradients: true,
    },
    typography: {
      fontSize: true,
      lineHeight: true,
    },
    shadow: true,
    spacing: {
      padding: ['horizontal', 'vertical'],
      margin: ['top', 'bottom'],
    },
    __experimentalBorder: {
      color: true,
      radius: true,
      style: true,
      width: true,
      __experimentalSkipSerialization: true,
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
  },
  save,
  migrate(attributes) {
    console.log('migrate', attributes);
    return attributes;
  },
};
