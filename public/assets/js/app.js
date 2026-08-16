(function () {
  'use strict';

  function navInit() {
    const toggle = document.querySelector('.mobile-toggle');
    const menu = document.querySelector('.nav-links');
    if (!toggle || !menu) return;

    toggle.setAttribute('aria-expanded', 'false');
    toggle.addEventListener('click', () => {
      const open = menu.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    menu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        menu.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });

    window.addEventListener('resize', () => {
      if (window.innerWidth > 1080) {
        menu.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    }, { passive: true });
  }

  function headerInit() {
    const header = document.querySelector('.header');
    if (!header) return;
    const update = () => header.classList.toggle('header-scrolled', window.scrollY > 16);
    update();
    window.addEventListener('scroll', update, { passive: true });
  }

  // Progressive enhancement only: content is visible before JS and remains visible
  // even if IntersectionObserver is unavailable or fails.
  function revealInit() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (!('IntersectionObserver' in window)) return;

    const nodes = document.querySelectorAll([
      '.section-head', '.category-card', '.why-card', '.partner',
      '.product-card', '.content-card', '.contact-box', '.form-card',
      '.info-card-v12', '.trust-band-v12', '.detail-usage-card-v12',
      '.product-inquiry-v12', '.request-guide-v11'
    ].join(','));

    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('v12-reveal-in');
        obs.unobserve(entry.target);
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -24px 0px' });

    nodes.forEach(node => observer.observe(node));
  }

  function galleryInit() {
    const main = document.getElementById('product-main-image');
    const buttons = document.querySelectorAll('.thumb-button-v12, .thumb-button');
    if (!main || !buttons.length) return;

    buttons.forEach(button => {
      button.addEventListener('click', () => {
        const next = button.dataset.fullImage;
        if (!next) return;

        main.animate(
          [{ opacity: .62, transform: 'scale(.995)' }, { opacity: 1, transform: 'scale(1)' }],
          { duration: 210, easing: 'ease-out' }
        );
        main.src = next;
        buttons.forEach(item => item.classList.remove('active'));
        button.classList.add('active');
      });
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    navInit();
    headerInit();
    revealInit();
    galleryInit();
  });
})();
