// The Farm Care homepage interactions
// Small but premium motion touches

document.addEventListener("DOMContentLoaded", () => {
    initReveal();
    initMagneticButtons();
    initTiltCards();
    initHeroParallax();
});

// reveal-on-scroll
function initReveal() {
    const items = document.querySelectorAll(".reveal-up");

    if (!items.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("is-visible");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.14 });

    items.forEach((item) => observer.observe(item));
}

// magnetic buttons
function initMagneticButtons() {
    const buttons = document.querySelectorAll(".magnetic-btn");

    buttons.forEach((btn) => {
        btn.addEventListener("mousemove", (e) => {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;

            btn.style.transform = `translate(${x * 0.10}px, ${y * 0.10}px)`;
        });

        btn.addEventListener("mouseleave", () => {
            btn.style.transform = "";
        });
    });
}

// tilt effect for premium cards
function initTiltCards() {
    const cards = document.querySelectorAll(".interactive-card, .product-card, .interactive-dark-card");

    if (window.innerWidth < 992) return;

    cards.forEach((card) => {
        card.addEventListener("mousemove", (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const rotateY = ((x / rect.width) - 0.5) * 8;
            const rotateX = ((y / rect.height) - 0.5) * -8;

            card.style.transform = `perspective(900px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "";
        });
    });
}

// hero parallax on mouse move
function initHeroParallax() {
    const hero = document.querySelector(".hero-premium");
    const copy = document.querySelector(".hero-copy");
    const pills = document.querySelectorAll(".floating-pill");

    if (!hero || !copy || window.innerWidth < 992) return;

    hero.addEventListener("mousemove", (e) => {
        const rect = hero.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const moveX = (x / rect.width - 0.5) * 18;
        const moveY = (y / rect.height - 0.5) * 18;

        copy.style.transform = `translate(${moveX * 0.35}px, ${moveY * 0.35}px)`;

        pills.forEach((pill, index) => {
            const speed = (index + 1) * 0.18;
            pill.style.transform = `translate(${moveX * speed}px, ${moveY * speed}px)`;
        });
    });

    hero.addEventListener("mouseleave", () => {
        copy.style.transform = "";
        pills.forEach((pill) => {
            pill.style.transform = "";
        });
    });
}

document.querySelector("form").addEventListener("submit", function() {
    const btn = document.getElementById("submitBtn");
    btn.innerText = "Sending...";
    btn.disabled = true;
});
