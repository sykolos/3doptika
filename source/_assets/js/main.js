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

// =============================
// TESTIMONIALS
// =============================

const slides = document.querySelectorAll('.testimonial-card__content');

if (slides.length) {

  const dots = document.querySelectorAll('.dot');
  const prev = document.querySelector('.t-nav__left');
  const next = document.querySelector('.t-nav__right');

  let current = 0;

  function showSlide(index) {
    slides.forEach(s => s.classList.remove('is-active'));
    dots.forEach(d => d.classList.remove('dot--active'));

    slides[index]?.classList.add('is-active');
    dots[index]?.classList.add('dot--active');

    current = index;
  }

  if (prev) {
    prev.addEventListener('click', () => {
      showSlide((current - 1 + slides.length) % slides.length);
    });
  }

  if (next) {
    next.addEventListener('click', () => {
      showSlide((current + 1) % slides.length);
    });
  }

  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => showSlide(i));
  });
}


// =============================
// COOKIE BANNER + GA4
// =============================

const banner = document.querySelector('.cookie-banner');
const accept = document.getElementById('accept-cookies');
const reject = document.getElementById('reject-cookies');

function loadAnalytics() {

  // Ha már betöltöttük egyszer, ne töltsük újra
  if (window.gtag) return;

  const script = document.createElement('script');
  script.src = 'https://www.googletagmanager.com/gtag/js?id=G-302EV7CHZ7';
  script.async = true;
  document.head.appendChild(script);

  window.dataLayer = window.dataLayer || [];

  function gtag(){ dataLayer.push(arguments); }
  window.gtag = gtag;

  gtag('js', new Date());
  gtag('config', 'G-302EV7CHZ7');
}

if (banner && accept && reject) {

  const consent = localStorage.getItem('cookie_consent');

  // Ha korábban már elfogadta → automatikusan betöltjük
  if (consent === 'accepted') {
    loadAnalytics();
  }

  // Ha még nincs döntés → banner megjelenik
  if (!consent) {
    banner.classList.add('active');
  }

  accept.addEventListener('click', () => {
    localStorage.setItem('cookie_consent', 'accepted');
    banner.classList.remove('active');
    loadAnalytics();
  });

  reject.addEventListener('click', () => {
    localStorage.setItem('cookie_consent', 'rejected');
    banner.classList.remove('active');
  });

}
