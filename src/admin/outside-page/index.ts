document.addEventListener('DOMContentLoaded', function () {
  const elements = document.querySelectorAll('#toplevel_page_l-clutch > ul.wp-submenu > li');
  elements.forEach((element) => {
    const anchor = element.querySelector('a');
    if (!anchor) return;
    const externalIcon = anchor.querySelector('span[data-external]');
    if (!externalIcon) return;
    anchor.target = '_blank';
    anchor.rel = 'noopener noreferrer';
  });
});
