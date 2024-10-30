declare global {
  var lClutchCoreSettings: {
    siteUrl: string;
    assetUrl: string;
    apiBase: string;
    basicId?: string;
    nonce: string;
    adminUrlActionNonce: string;
    menuItems: {
      title: string;
      path?: string;
      href?: string;
    }[];
  };
}

export {};
