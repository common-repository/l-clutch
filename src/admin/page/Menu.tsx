import { useRouterStore } from '@l-clutch/core';
import { FC, useMemo } from 'react';

export const Menu = () => {
  const items = lClutchCoreSettings.menuItems;
  const basicId = lClutchCoreSettings.basicId;

  return (
    <ul className="wp-submenu wp-submenu-wrap">
      {items.map((item, index) => {
        if (item.path) {
          return (
            <MenuItem className={index === 0 ? 'wp-first-item' : ''} path={item.path} key={'menu-item-' + index}>
              {item.title}
            </MenuItem>
          );
        } else if (item.href && basicId) {
          const href = item.href.replace('%s', basicId);
          return (
            <MenuLink href={href} key={'menu-link-' + index}>
              {item.title}
            </MenuLink>
          );
        }
      })}
    </ul>
  );
};

type MenuItemProps = {
  children: React.ReactNode;
  path: string;
  className?: string;
};

const MenuItem: FC<MenuItemProps> = ({ children, path, className: aditionalClass }) => {
  const { getPath, setPath } = useRouterStore();

  const nowPath = getPath(0) ?? '';
  const isCurrent = useMemo(() => path.replace(/^\//, '') === nowPath, [path, nowPath]);

  const className = useMemo(() => {
    const classes = isCurrent ? ['current'] : [];
    if (aditionalClass) classes.push(aditionalClass);
    return classes.join(' ');
  }, [isCurrent]);

  return (
    <li className={className}>
      <a
        href={`?page=l-clutch-admin&path=${path}`}
        className={className}
        aria-current={isCurrent ? 'page' : undefined}
        onClick={(e) => {
          e.preventDefault();
          setPath(path);
        }}
      >
        {children}
      </a>
    </li>
  );
};

type MenuLinkProps = {
  href: string;
  children: React.ReactNode;
};

const MenuLink: FC<MenuLinkProps> = ({ href, children }) => (
  <li>
    <a href={href} target="_blank" rel="noopener noreferrer">
      {children}
      <span className="dashicons dashicons-external l-clutch-external-icon"></span>
    </a>
  </li>
);
