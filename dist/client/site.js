// Mobile menu button and the Advertise dropdown toggle. Without this script
// every navigation link stays visible and the dropdown opens on hover or focus.
document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {
  const menu = document.getElementById('menu');
  const menuToggle = menu && menu.querySelector('.menu-toggle');
  const submenuToggle = menu && menu.querySelector('.submenu-toggle');
  if (!menuToggle || !submenuToggle) return;
  const dropdown = submenuToggle.closest('.has-dropdown');

  const setMenu = open => {
    menuToggle.setAttribute('aria-expanded', String(open));
    menu.classList.toggle('is-open', open);
  };
  const setSubmenu = open => {
    submenuToggle.setAttribute('aria-expanded', String(open));
    dropdown.classList.toggle('is-open', open);
  };
  const isOpen = button => button.getAttribute('aria-expanded') === 'true';

  menuToggle.addEventListener('click', () => setMenu(!isOpen(menuToggle)));
  submenuToggle.addEventListener('click', () => setSubmenu(!isOpen(submenuToggle)));

  // Close menus after choosing a link, clicking elsewhere or pressing Escape.
  menu.addEventListener('click', event => {
    if (event.target.closest('a')) {
      setMenu(false);
      setSubmenu(false);
    }
  });
  document.addEventListener('click', event => {
    if (!dropdown.contains(event.target)) setSubmenu(false);
  });
  dropdown.addEventListener('focusout', event => {
    if (!dropdown.contains(event.relatedTarget)) setSubmenu(false);
  });
  document.addEventListener('keydown', event => {
    if (event.key !== 'Escape') return;
    if (isOpen(submenuToggle)) {
      setSubmenu(false);
      submenuToggle.focus();
    } else if (isOpen(menuToggle)) {
      setMenu(false);
      menuToggle.focus();
    }
  });
});
