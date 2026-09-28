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

// Contact form is a demo: submitting shows a thank-you dialog instead of
// actually sending anything.
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('contact-form');
  const modal = document.getElementById('demo-modal');
  const closeButton = document.getElementById('demo-modal-close');
  if (!form || !modal || !closeButton) return;

  let lastFocused = null;

  const openModal = () => {
    lastFocused = document.activeElement;
    modal.hidden = false;
    closeButton.focus();
  };
  const closeModal = () => {
    modal.hidden = true;
    if (lastFocused) lastFocused.focus();
  };

  form.addEventListener('submit', event => {
    event.preventDefault();
    openModal();
  });
  closeButton.addEventListener('click', closeModal);
  modal.addEventListener('click', event => {
    if (event.target === modal) closeModal();
  });
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && !modal.hidden) closeModal();
  });
});

// Click-to-copy button next to the mailing address on the subscribe page.
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.copy-address-button').forEach(button => {
    const label = button.querySelector('.copy-address-button-label');
    const defaultText = label ? label.textContent : button.textContent;
    let resetTimer = null;

    const showCopied = () => {
      if (label) label.textContent = 'Copied!';
      button.classList.add('is-copied');
      clearTimeout(resetTimer);
      resetTimer = setTimeout(() => {
        if (label) label.textContent = defaultText;
        button.classList.remove('is-copied');
      }, 2500);
    };

    button.addEventListener('click', async () => {
      const text = button.getAttribute('data-copy-text') || '';
      try {
        if (navigator.clipboard && window.isSecureContext) {
          await navigator.clipboard.writeText(text);
        } else {
          const textarea = document.createElement('textarea');
          textarea.value = text;
          textarea.style.position = 'fixed';
          textarea.style.opacity = '0';
          document.body.appendChild(textarea);
          textarea.select();
          document.execCommand('copy');
          document.body.removeChild(textarea);
        }
        showCopied();
      } catch (error) {
        // Clipboard access denied or unavailable; leave the button as-is.
      }
    });
  });
});
