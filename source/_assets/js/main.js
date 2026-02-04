const mobileNav = document.querySelector('.mobile-nav');
const menu = document.querySelector('#mobile-menu');
const toggle = document.querySelector('.mobile-nav__toggle');

if (mobileNav && menu && toggle) {
  menu.removeAttribute('hidden');

  let open = false;

  toggle.addEventListener('click', e => {
    e.preventDefault();

    open = !open;

    toggle.setAttribute('aria-expanded', open);
    toggle.classList.toggle('is-open', open); 
    mobileNav.classList.toggle('mobile-nav--open', open);
    document.body.classList.toggle('is-nav-open', open);


    if (open) {
      const firstLink = mobileNav.querySelector('.mobile-nav__item a');
      firstLink?.focus();
    }
  });

  //  bármely link bezárja a menüt
  const navLinks = mobileNav.querySelectorAll('a');

  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      open = false;
      mobileNav.classList.remove('mobile-nav--open');
      document.body.classList.remove('is-nav-open');
      toggle.setAttribute('aria-expanded', 'false');
    });
  });
}
