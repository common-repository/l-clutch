import save from './save';

export default {
  attributes: {
    width: {
      type: 'string',
      default: '100px',
    },
    borderColor: {
      type: 'string',
    },
  },
  supports: {
    align: ['wide', 'full'],
    shadow: true,
    spacing: {
      margin: true,
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
    const { style, ...rest } = attributes;

    if (style.border) {
      delete style.border;
    }

    return {
      ...rest,
      style,
    };
  },
};
