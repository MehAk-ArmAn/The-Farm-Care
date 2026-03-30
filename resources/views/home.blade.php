@extends('layouts.app')

@section('content')

{{-- HERO / SLIDER --}}
<section
    id="home"
    x-data="{
        current: 0,
        progress: 0,
        autoplay: null,
        progressTimer: null,
        slides: [
            '{{ asset('images/banners/hero-1.jpg') }}',
            '{{ asset('images/banners/hero-2.jpg') }}',
            '{{ asset('images/banners/hero-3.jpg') }}'
        ],
        startAutoplay() {
            this.stopAutoplay();
            this.progress = 0;

            this.progressTimer = setInterval(() => {
                this.progress = Math.min(this.progress + 2, 100);
            }, 100);

            this.autoplay = setInterval(() => {
                this.next();
            }, 5000);
        },
        stopAutoplay() {
            if (this.autoplay) clearInterval(this.autoplay);
            if (this.progressTimer) clearInterval(this.progressTimer);
        },
        resetProgress() {
            this.progress = 0;
            if (this.progressTimer) clearInterval(this.progressTimer);
            this.progressTimer = setInterval(() => {
                this.progress = Math.min(this.progress + 2, 100);
            }, 100);
        },
        next() {
            this.current = (this.current + 1) % this.slides.length;
            this.resetProgress();
        },
        prev() {
            this.current = (this.current - 1 + this.slides.length) % this.slides.length;
            this.resetProgress();
        },
        goTo(index) {
            this.current = index;
            this.resetProgress();
        }
    }"
    x-init="startAutoplay()"
    @mouseenter="stopAutoplay()"
    @mouseleave="startAutoplay()"
    class="hero-premium group relative h-[78vh] overflow-hidden bg-slate-200"
>
    {{-- Slides --}}
    <template x-for="(slide, index) in slides" :key="index">
        <div
            x-show="current === index"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-[1.04]"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-[1.02]"
            class="absolute inset-0"
        >
            <img
                :src="slide"
                alt="Farm Care Banner"
                class="hero-image h-full w-full object-cover"
            >
            <div class="absolute inset-0 bg-slate-950/60"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/75 via-slate-950/40 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
        </div>
    </template>

    {{-- Floating glow --}}
    <div class="pointer-events-none absolute -left-20 top-20 h-56 w-56 rounded-full bg-[var(--brand-green)]/20 blur-3xl"></div>
    <div class="pointer-events-none absolute right-0 top-10 h-64 w-64 rounded-full bg-[var(--brand-gold)]/20 blur-3xl"></div>

    {{-- Floating pills --}}
    <div class="floating-pill absolute left-[6%] top-[18%] z-20 hidden rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold text-white/90 shadow-lg backdrop-blur-md lg:block">
        Trusted Since 2011
    </div>
    <div class="floating-pill absolute right-[7%] top-[22%] z-20 hidden rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold text-white/90 shadow-lg backdrop-blur-md lg:block">
        Export Ready Supply
    </div>
    <div class="floating-pill absolute bottom-[20%] right-[11%] z-20 hidden rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold text-white/90 shadow-lg backdrop-blur-md xl:block">
        Veterinary + Nutrition
    </div>

    {{-- Hero content --}}
    <div class="relative z-20 mx-auto flex h-full max-w-7xl items-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl hero-copy">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-white/90 backdrop-blur-md">
                <span class="inline-block h-2 w-2 rounded-full bg-[var(--brand-green)] shadow-[0_0_15px_rgba(34,197,94,0.8)]"></span>
                The Farm Care
            </div>

            <h1 class="mt-6 text-4xl font-bold leading-tight text-white sm:text-5xl lg:text-6xl">
                Reliable Veterinary Equipment &
                <span class="text-[var(--brand-gold)]">Animal Nutrition</span>
                Solutions
            </h1>

            <p class="mt-6 max-w-2xl text-base leading-8 text-white/80 sm:text-lg">
                Trusted veterinary equipment and animal nutrition solutions from Sialkot, Pakistan —
                built for farms, clinics, distributors, and global buyers who value quality, reliability, and long-term support.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="#products" class="premium-btn premium-btn-primary magnetic-btn rounded-full px-6 py-3 text-sm font-semibold text-white">
                    Explore Products
                </a>

                <a href="#contact" class="premium-btn premium-btn-secondary magnetic-btn rounded-full px-6 py-3 text-sm font-semibold text-white">
                    Contact Us
                </a>
            </div>

            <div class="mt-8 flex flex-wrap gap-3">
                <div class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/85 backdrop-blur-md">
                    300+ Veterinary Stores
                </div>
                <div class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/85 backdrop-blur-md">
                    250+ Farm Setups
                </div>
                <div class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/85 backdrop-blur-md">
                    Fast Export Support
                </div>
            </div>
        </div>
    </div>

    {{-- Left Arrow --}}
    <button
        @click="prev()"
        class="slider-arrow absolute left-4 top-1/2 z-30 -translate-y-1/2 rounded-full border border-white/15 bg-black/30 px-4 py-3 text-2xl font-bold text-white backdrop-blur-md transition"
        aria-label="Previous Slide"
    >
        &#10094;
    </button>

    {{-- Right Arrow --}}
    <button
        @click="next()"
        class="slider-arrow absolute right-4 top-1/2 z-30 -translate-y-1/2 rounded-full border border-white/15 bg-black/30 px-4 py-3 text-2xl font-bold text-white backdrop-blur-md transition"
        aria-label="Next Slide"
    >
        &#10095;
    </button>

    {{-- Dots --}}
    <div class="absolute bottom-6 left-1/2 z-30 flex -translate-x-1/2 gap-3">
        <template x-for="(slide, index) in slides" :key="'dot-' + index">
            <button
                @click="goTo(index)"
                class="h-3 w-3 rounded-full border border-white/30 transition-all duration-300"
                :class="current === index ? 'scale-125 bg-white' : 'bg-white/40 hover:bg-white/70'"
                :aria-label="'Go to slide ' + (index + 1)"
            ></button>
        </template>
    </div>

    {{-- Progress bar --}}
    <div class="absolute bottom-0 left-0 z-30 h-1 w-full bg-white/10">
        <div class="h-full bg-[var(--brand-green)] transition-all duration-100" :style="`width: ${progress}%`"></div>
    </div>
</section>

{{-- INTRO --}}
<section class="relative overflow-hidden bg-white py-20 text-center">
    <div class="pointer-events-none absolute -top-16 left-1/2 h-48 w-48 -translate-x-1/2 rounded-full bg-[var(--brand-green)]/10 blur-3xl"></div>

    <div class="mx-auto max-w-4xl px-4 reveal-up">
        <div class="inline-flex rounded-full border border-[var(--brand-green)]/15 bg-[var(--brand-green)]/5 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">
            Trusted Livestock Care Partner
        </div>

        <h1 class="mt-5 text-4xl font-bold text-slate-900 sm:text-5xl">
            The Farm Care
        </h1>

        <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
            Premium veterinary equipment and animal nutrition solutions crafted for practical farm performance,
            clinical reliability, and long-term business trust.
        </p>

        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="#products" class="premium-btn premium-btn-green magnetic-btn rounded-full px-6 py-3 text-sm font-semibold text-white">
                Explore Products
            </a>

            <a href="#contact" class="premium-btn premium-btn-light magnetic-btn rounded-full px-6 py-3 text-sm font-semibold text-slate-800">
                Contact Us
            </a>
        </div>
    </div>
</section>

{{-- SUPPORT STRIP --}}
<section class="bg-white py-12">
    <div class="mx-auto grid max-w-7xl gap-6 px-4 text-center sm:grid-cols-2 lg:grid-cols-4 sm:px-6 lg:px-8">
        <div class="interactive-card rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[var(--brand-green)]/10 ring-1 ring-[var(--brand-green)]/10">
                <img src="{{ asset('images/icons/support.png') }}" alt="24/7 Customer Supports" class="h-9 w-9 object-contain">
            </div>
            <h3 class="mt-4 text-lg font-semibold text-slate-900">24/7 Customer Support</h3>
            <p class="mt-2 text-sm leading-7 text-slate-600">Responsive assistance for customers, distributors, and business partners.</p>
        </div>

        <div class="interactive-card rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[var(--brand-green)]/10 ring-1 ring-[var(--brand-green)]/10">
                <img src="{{ asset('images/icons/quality.png') }}" alt="Quality Products" class="h-9 w-9 object-contain">
            </div>
            <h3 class="mt-4 text-lg font-semibold text-slate-900">Quality Products</h3>
            <p class="mt-2 text-sm leading-7 text-slate-600">Reliable veterinary and animal care solutions built for performance.</p>
        </div>

        <div class="interactive-card rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[var(--brand-green)]/10 ring-1 ring-[var(--brand-green)]/10">
                <img src="{{ asset('images/icons/guarantee.png') }}" alt="Money Back Guarantee" class="h-9 w-9 object-contain">
            </div>
            <h3 class="mt-4 text-lg font-semibold text-slate-900">Buyer Confidence</h3>
            <p class="mt-2 text-sm leading-7 text-slate-600">Built on trust, transparent support, and dependable service quality.</p>
        </div>

        <div class="interactive-card rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[var(--brand-green)]/10 ring-1 ring-[var(--brand-green)]/10">
                <img src="{{ asset('images/icons/shipping.png') }}" alt="Fast Shipping" class="h-9 w-9 object-contain">
            </div>
            <h3 class="mt-4 text-lg font-semibold text-slate-900">Fast Shipping</h3>
            <p class="mt-2 text-sm leading-7 text-slate-600">Quick dispatch support for domestic delivery and export orders.</p>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section id="about" class="bg-white py-20">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div class="reveal-up">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">About The Farm Care</p>
            <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">
                Trusted veterinary equipment and animal nutrition solutions.
            </h2>
            <p class="mt-6 text-base leading-8 text-slate-600">
                The Farm Care is a trusted name in veterinary equipment and animal nutrition solutions, proudly based in Sialkot, Pakistan.
            </p>
            <p class="mt-4 text-base leading-8 text-slate-600">
                Our focus is on quality, reliability, and practical products for farms, clinics, distributors, and international buyers.
            </p>

            <div class="mt-8 grid gap-4 sm:grid-cols-2">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm font-semibold text-slate-900">Premium Quality</p>
                    <p class="mt-2 text-sm leading-7 text-slate-600">Products chosen for real use, not just display.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm font-semibold text-slate-900">Global Supply Vision</p>
                    <p class="mt-2 text-sm leading-7 text-slate-600">Built for local trust and international growth.</p>
                </div>
            </div>
        </div>

        <div class="reveal-up">
            <div class="interactive-card overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-2 shadow-xl">
                <img src="{{ asset('images/sections/middle.png') }}" alt="The Farm Care" class="h-full w-full rounded-[1.6rem] object-cover">
            </div>
        </div>
    </div>
</section>

{{-- CATEGORIES --}}
<section class="relative overflow-hidden bg-[var(--brand-light)] py-20">
    <div class="pointer-events-none absolute right-0 top-0 h-44 w-44 rounded-full bg-[var(--brand-green)]/10 blur-3xl"></div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl reveal-up">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">Categories</p>
            <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Main product categories</h2>
            <p class="mt-4 text-base leading-8 text-slate-600">
                Explore our core product lines designed for veterinary clinics, livestock care operations, and business buyers.
            </p>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            <div class="interactive-card rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <div class="mb-5 inline-flex rounded-full bg-[var(--brand-green)]/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-[var(--brand-green)]">
                    Precision Care
                </div>
                <h3 class="text-xl font-semibold text-slate-900">Dental Instruments</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Professional instruments designed for dependable handling and daily use.</p>
            </div>

            <div class="interactive-card rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <div class="mb-5 inline-flex rounded-full bg-[var(--brand-green)]/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-[var(--brand-green)]">
                    Core Range
                </div>
                <h3 class="text-xl font-semibold text-slate-900">Veterinary Instruments</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Essential solutions for farms, clinics, and professional veterinary supply needs.</p>
            </div>

            <div class="interactive-card rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <div class="mb-5 inline-flex rounded-full bg-[var(--brand-green)]/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-[var(--brand-green)]">
                    Specialty Line
                </div>
                <h3 class="text-xl font-semibold text-slate-900">Hunting Knife</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">A specialty category presented with premium finishing and bold design presence.</p>
            </div>
        </div>
    </div>
</section>

{{-- PRODUCTS --}}
<section id="products" class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between reveal-up">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">Products</p>
                <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Featured product showcase</h2>
                <p class="mt-4 max-w-2xl text-base leading-8 text-slate-600">
                    A curated selection of featured items that reflect the quality, utility, and confidence behind The Farm Care brand.
                </p>
            </div>
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-[var(--brand-green)] transition hover:text-slate-900">
                View all products →
            </a>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <article class="product-card group rounded-[2rem] border border-slate-200 bg-white p-5 shadow-sm">
                <div class="overflow-hidden rounded-[1.5rem]">
                    <img src="{{ asset('images/products/product-1.jpg') }}" alt="Product 1" class="h-56 w-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <h3 class="mt-5 text-lg font-semibold text-slate-900 transition group-hover:text-[var(--brand-green)]">Featured Product 1</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Replace this title with the exact product name from your product set.</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[var(--brand-green)]">
                    View Details <span class="transition group-hover:translate-x-1">→</span>
                </a>
            </article>

            <article class="product-card group rounded-[2rem] border border-slate-200 bg-white p-5 shadow-sm">
                <div class="overflow-hidden rounded-[1.5rem]">
                    <img src="{{ asset('images/products/product-2.jpg') }}" alt="Product 2" class="h-56 w-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <h3 class="mt-5 text-lg font-semibold text-slate-900 transition group-hover:text-[var(--brand-green)]">Featured Product 2</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Replace this with the exact homepage product title from your content set.</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[var(--brand-green)]">
                    View Details <span class="transition group-hover:translate-x-1">→</span>
                </a>
            </article>

            <article class="product-card group rounded-[2rem] border border-slate-200 bg-white p-5 shadow-sm">
                <div class="overflow-hidden rounded-[1.5rem]">
                    <img src="{{ asset('images/products/product-3.jpg') }}" alt="Product 3" class="h-56 w-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <h3 class="mt-5 text-lg font-semibold text-slate-900 transition group-hover:text-[var(--brand-green)]">Featured Product 3</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Replace this with the matching old-site product text after download.</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[var(--brand-green)]">
                    View Details <span class="transition group-hover:translate-x-1">→</span>
                </a>
            </article>

            <article class="product-card group rounded-[2rem] border border-slate-200 bg-white p-5 shadow-sm">
                <div class="overflow-hidden rounded-[1.5rem]">
                    <img src="{{ asset('images/products/product-4.jpg') }}" alt="Product 4" class="h-56 w-full object-cover transition duration-700 group-hover:scale-110">
                </div>
                <h3 class="mt-5 text-lg font-semibold text-slate-900 transition group-hover:text-[var(--brand-green)]">Featured Product 4</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Replace this with the matching old-site product text after download.</p>
                <a href="{{ route('products.index') }}" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[var(--brand-green)]">
                    View Details <span class="transition group-hover:translate-x-1">→</span>
                </a>
            </article>
        </div>
    </div>
</section>

{{-- WHY CHOOSE US --}}
<section class="relative overflow-hidden bg-slate-950 py-20 text-white">
    <div class="pointer-events-none absolute left-0 top-0 h-60 w-60 rounded-full bg-[var(--brand-green)]/10 blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-0 right-0 h-60 w-60 rounded-full bg-[var(--brand-gold)]/10 blur-3xl"></div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl reveal-up">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-gold)]">Why Choose Us</p>
            <h2 class="mt-4 text-3xl font-bold sm:text-4xl">Built for quality, support, and reliable supply.</h2>
            <p class="mt-4 text-base leading-8 text-white/70">
                We combine trusted product quality, responsive support, customization capability, and professional supply reliability.
            </p>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3 xl:grid-cols-4">
            <div class="interactive-dark-card rounded-[2rem] border border-white/10 bg-white/5 p-6 text-center backdrop-blur-sm">
                <img src="{{ asset('images/icons/shipping.png') }}" alt="Fast Shipping" class="mx-auto h-14 w-14 object-contain">
                <h3 class="mt-4 text-lg font-semibold">FAST SHIPPING</h3>
            </div>

            <div class="interactive-dark-card rounded-[2rem] border border-white/10 bg-white/5 p-6 text-center backdrop-blur-sm">
                <img src="{{ asset('images/icons/oem.png') }}" alt="OEM" class="mx-auto h-14 w-14 object-contain">
                <h3 class="mt-4 text-lg font-semibold">OEM</h3>
            </div>

            <div class="interactive-dark-card rounded-[2rem] border border-white/10 bg-white/5 p-6 text-center backdrop-blur-sm">
                <img src="{{ asset('images/icons/customization.png') }}" alt="Customization" class="mx-auto h-14 w-14 object-contain">
                <h3 class="mt-4 text-lg font-semibold">CUSTOMIZATION</h3>
            </div>

            <div class="interactive-dark-card rounded-[2rem] border border-white/10 bg-white/5 p-6 text-center backdrop-blur-sm">
                <img src="{{ asset('images/icons/technical.png') }}" alt="Technical Support" class="mx-auto h-14 w-14 object-contain">
                <h3 class="mt-4 text-lg font-semibold">TECHNICAL SUPPORT</h3>
            </div>
        </div>
    </div>
</section>

{{-- NEWSLETTER / CTA --}}
<section class="bg-white py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
        <div class="reveal-up">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">Subscribe</p>
            <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Subscribe to our Newsletter</h2>
            <p class="mt-6 text-base leading-8 text-slate-600">
                Stay connected for product updates, new arrivals, and business opportunities.
            </p>

            <form class="mt-8 flex flex-col gap-4 sm:flex-row">
                <input type="email" placeholder="Enter your email" class="w-full rounded-full border border-slate-300 px-5 py-3 outline-none transition focus:border-[var(--brand-green)] focus:ring-4 focus:ring-[var(--brand-green)]/10">
                <button type="button" class="premium-btn premium-btn-green magnetic-btn rounded-full px-6 py-3 text-sm font-semibold text-white">
                    Subscribe
                </button>
            </form>
        </div>

        <div class="reveal-up">
            <div class="interactive-card overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-2 shadow-xl">
                <img src="{{ asset('images/sections/newsletter.jpg') }}" alt="Newsletter" class="h-full w-full rounded-[1.6rem] object-cover">
            </div>
        </div>
    </div>
</section>

{{-- CONTACT --}}
<section id="contact" class="bg-[var(--brand-light)] py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div class="reveal-up">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">Contact</p>
            <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Get in touch with The Farm Care</h2>

            <div class="mt-8 space-y-5">
                <div class="rounded-3xl border border-slate-300 bg-slate-100/80 p-4 shadow-sm backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/emergency-call.png') }}" alt="Call" class="h-6 w-6 object-contain">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Call Us</p>
                            <p class="text-sm text-slate-600">+92 300 613 1926</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-300 bg-slate-100/80 p-4 shadow-sm backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/icons/emergency-call.png') }}" alt="Email" class="h-6 w-6 object-contain">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Email</p>
                            <p class="text-sm text-slate-600">info@thefarmcare.com</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-300 bg-slate-100/80 p-4 shadow-sm backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/sections/footer.png') }}" alt="Location" class="h-6 w-6 object-contain">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Location</p>
                            <p class="text-sm text-slate-600">Sialkot, 51310 Pakistan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('contact.submit') }}" method="POST" class="interactive-card rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm reveal-up">
            @csrf

            <div class="grid gap-5 sm:grid-cols-2">

                <!-- Full Name -->
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Full Name"
                    required
                    class="rounded-2xl border border-slate-200 px-4 py-3 outline-none focus:border-[var(--brand-green)]"
                >

                <!-- Email -->
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Email Address"
                    required
                    class="rounded-2xl border border-slate-200 px-4 py-3 outline-none focus:border-[var(--brand-green)]"
                >

                <!-- Company -->
                <input
                    type="text"
                    name="company"
                    value="{{ old('company') }}"
                    placeholder="Company Name"
                    class="rounded-2xl border border-slate-200 px-4 py-3 outline-none focus:border-[var(--brand-green)] sm:col-span-2"
                >

                <!-- Message -->
                <textarea
                    name="message"
                    rows="5"
                    placeholder="Tell us what products you need"
                    required
                    class="rounded-2xl border border-slate-200 px-4 py-3 outline-none focus:border-[var(--brand-green)] sm:col-span-2"
                >{{ old('message') }}</textarea>
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="premium-btn premium-btn-green magnetic-btn mt-6 rounded-full px-6 py-3 text-sm font-semibold text-white"
                id="submitBtn"
            >
                Send Inquiry
            </button>

            <!-- Success message -->
            @if(session('success'))
                <p class="mt-4 text-green-600 font-semibold">
                    {{ session('success') }}
                </p>
            @endif

        </form>
    </div>
</section>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/farmcare-home.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/farmcare-home.js') }}"></script>
@endpush
