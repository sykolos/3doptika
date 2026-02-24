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

document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelectorAll('.testimonial-card__content');
  if (!slides.length) return;

  const dots = document.querySelectorAll('.dot');
  const prev = document.querySelector('.t-nav--left');
  const next = document.querySelector('.t-nav--right');

  let current = 0;

  function showSlide(index) {
    slides.forEach(s => s.classList.remove('is-active'));
    dots.forEach(d => d.classList.remove('dot--active'));

    slides[index].classList.add('is-active');
    dots[index].classList.add('dot--active');
    current = index;
  }

  prev.addEventListener('click', () => {
    showSlide((current - 1 + slides.length) % slides.length);
  });

  next.addEventListener('click', () => {
    showSlide((current + 1) % slides.length);
  });

  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => showSlide(i));
  });
});

document.addEventListener("DOMContentLoaded", function () {
    const banner = document.getElementById("cookie-banner");
    const acceptBtn = document.getElementById("accept-cookies");
    const rejectBtn = document.getElementById("reject-cookies");

    const consent = localStorage.getItem("cookie_consent");

    if (!consent) {
        banner.style.display = "block";
    }

    if (consent === "accepted") {
        loadAnalytics();
    }

    acceptBtn.addEventListener("click", function () {
        localStorage.setItem("cookie_consent", "accepted");
        banner.style.display = "none";
        loadAnalytics();
    });

    rejectBtn.addEventListener("click", function () {
        localStorage.setItem("cookie_consent", "rejected");
        banner.style.display = "none";
    });

    function loadAnalytics() {
        const script = document.createElement("script");
        script.src = "https://www.googletagmanager.com/gtag/js?id=G-XXXXXXX";
        script.async = true;
        document.head.appendChild(script);

        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-XXXXXXX');
    }
});