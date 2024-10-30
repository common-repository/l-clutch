import { StrictMode as ReactStrictMode } from 'react';
import { createRoot, render } from 'react-dom';

import './tailwind.css';
import { App } from './App';
import { Menu } from './Menu';

window.addEventListener(
  'load',
  function () {
    renderApp();
    renderMenu();
  },
  false,
);

const renderApp = () => {
  const rootElement = document.getElementById('app-root');
  if (!rootElement) return;

  const uiElement = (
    <StrictMode>
      <App />
    </StrictMode>
  );
  if (createRoot) {
    createRoot(rootElement).render(uiElement);
  } else {
    render(uiElement, rootElement);
  }
};

const renderMenu = () => {
  const rootElement = document.getElementById('toplevel_page_l-clutch')?.querySelector('ul.wp-submenu');
  if (!rootElement) return;

  const uiElement = (
    <StrictMode>
      <Menu />
    </StrictMode>
  );

  if (createRoot) {
    createRoot(rootElement).render(uiElement);
  } else {
    render(uiElement, rootElement);
  }
};

const StrictMode = ({ children }) => {
  if (process.env.IS_DEV) {
    return <ReactStrictMode>{children}</ReactStrictMode>;
  } else {
    return <>{children}</>;
  }
};
