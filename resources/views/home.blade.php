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
    class="hero-premium group relative min-h-[78vh] overflow-hidden"
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

            {{-- Light overlays instead of dark --}}
            <div class="absolute inset-0 bg-white/40"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-white/85 via-white/55 to-white/10"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#F7FAF7]/70 via-transparent to-white/15"></div>
        </div>
    </template>

    {{-- Soft ambient glows --}}
    <div class="pointer-events-none absolute -left-20 top-20 h-56 w-56 rounded-full bg-[var(--brand-green)]/12 blur-3xl"></div>
    <div class="pointer-events-none absolute right-0 top-10 h-64 w-64 rounded-full bg-[#6E8B74]/12 blur-3xl"></div>

    {{-- Floating pills --}}
    <div class="floating-pill absolute left-[6%] top-[18%] z-20 hidden rounded-full border border-[#D9E5DB] bg-white/85 px-4 py-2 text-xs font-semibold text-[#1F2937] shadow-lg backdrop-blur-md lg:block">
        Trusted Since 2011
    </div>

    <div class="floating-pill absolute right-[7%] top-[22%] z-20 hidden rounded-full border border-[#D9E5DB] bg-white/85 px-4 py-2 text-xs font-semibold text-[#1F2937] shadow-lg backdrop-blur-md lg:block">
        Export Ready Supply
    </div>

    <div class="floating-pill absolute bottom-[20%] right-[11%] z-20 hidden rounded-full border border-[#D9E5DB] bg-white/85 px-4 py-2 text-xs font-semibold text-[#1F2937] shadow-lg backdrop-blur-md xl:block">
        Veterinary + Nutrition
    </div>

    {{-- Hero content --}}
    <div class="relative z-20 mx-auto flex h-full max-w-7xl items-center px-4 py-20 sm:px-6 lg:px-8">
        <div class="hero-copy max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-[#D9E5DB] bg-white/90 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-[#2F6B3B] shadow-sm backdrop-blur-md">
                <span class="inline-block h-2 w-2 rounded-full bg-[var(--brand-green)] shadow-[0_0_12px_rgba(47,107,59,0.45)]"></span>
                The Farm Care
            </div>

            <h1 class="mt-6 text-4xl font-bold leading-tight text-[#111827] sm:text-5xl lg:text-6xl">
                Reliable Veterinary Equipment &
                <span class="text-[var(--brand-green)]">Animal Nutrition</span>
                Solutions
            </h1>

            <p class="mt-6 max-w-2xl text-base leading-8 text-[#4B5563] sm:text-lg">
                Trusted veterinary equipment and animal nutrition solutions from Sialkot, Pakistan —
                built for farms, clinics, distributors, and global buyers who value quality, reliability, and long-term support.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('products.index') }}"
                   class="premium-btn premium-btn-primary magnetic-btn rounded-full px-6 py-3 text-sm font-semibold text-white">
                    Explore Products
                </a>

                <a href="{{ route('contact.form') }}"
                   class="premium-btn premium-btn-secondary magnetic-btn rounded-full px-6 py-3 text-sm font-semibold text-[#2F6B3B]">
                    Contact Us
                </a>
            </div>

            <div class="mt-8 flex flex-wrap gap-3">
                <div class="rounded-full border border-[#D9E5DB] bg-white/90 px-4 py-2 text-sm text-[#1F2937] shadow-sm backdrop-blur-md">
                    300+ Veterinary Stores
                </div>
                <div class="rounded-full border border-[#D9E5DB] bg-white/90 px-4 py-2 text-sm text-[#1F2937] shadow-sm backdrop-blur-md">
                    250+ Farm Setups
                </div>
                <div class="rounded-full border border-[#D9E5DB] bg-white/90 px-4 py-2 text-sm text-[#1F2937] shadow-sm backdrop-blur-md">
                    Fast Export Support
                </div>
            </div>
        </div>
    </div>

    <!-- {{-- Left Arrow --}}
    <button
        @click="prev()"
        class="slider-arrow absolute left-4 top-1/2 z-30 -translate-y-1/2 rounded-full border border-[#2F6B3B] bg-[#2F6B3B]/90 px-4 py-3 text-2xl font-bold text-white shadow-md backdrop-blur-md transition hover:bg-[#245530]"
        aria-label="Previous Slide"
    >
        &#10094;
    </button>

    {{-- Right Arrow --}}
    <button
        @click="next()"
        class="slider-arrow absolute right-4 top-1/2 z-30 -translate-y-1/2 rounded-full border border-[#2F6B3B] bg-[#2F6B3B]/90 px-4 py-3 text-2xl font-bold text-white shadow-md backdrop-blur-md transition hover:bg-[#245530]"
        aria-label="Next Slide"
    >
        &#10095;
    </button> -->

    {{-- Dots --}}
    <div class="absolute bottom-6 left-1/2 z-30 flex -translate-x-1/2 gap-3">
        <template x-for="(slide, index) in slides" :key="'dot-' + index">
            <button
                @click="goTo(index)"
                class="h-3 w-3 rounded-full border border-[#BFD3C3] transition-all duration-300"
                :class="current === index ? 'scale-125 bg-[#2F6B3B]' : 'bg-white/70 hover:bg-[#DDEEDF]'"
                :aria-label="'Go to slide ' + (index + 1)"
            ></button>
        </template>
    </div>

    {{-- Progress bar --}}
    <div class="absolute bottom-0 left-0 z-30 h-1 w-full bg-white/50">
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
            <a href="#products" class="premium-btn premium-btn-green magnetic-btn rounded-full px-6 py-3 text-sm font-semibold text-strong">
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
    @foreach($featuredProducts as $product)
        <article class="product-card group rounded-[2rem] border border-slate-200 bg-white p-5 shadow-sm">
            <div class="overflow-hidden rounded-[1.5rem]">
                <img
                    src="{{ $product->featured_image ? asset('images/products/' . $product->featured_image) : asset('images/placeholder.jpg') }}"
                    alt="{{ $product->name }}"
                    class="mx-auto align-center object-cover transition duration-700 group-hover:scale-110"
                >
            </div>
            <h3 class="mt-5 text-lg font-semibold text-slate-900 transition group-hover:text-[var(--brand-green)]">
                {{ $product->name }}
            </h3>
            <p class="mt-3 text-sm leading-7 text-slate-600 line-clamp-2">
                {{ $product->description }}
            </p>
            <a href="{{ route('products.show', $product->slug) }}" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[var(--brand-green)]">
                View Details <span class="transition group-hover:translate-x-1">→</span>
            </a>
        </article>
    @endforeach
</div>

    </div>
</section>

{{-- WHY CHOOSE US --}}
<section class="relative overflow-hidden bg-slate-950 py-20 text-strong">
    <div class="pointer-events-none absolute left-0 top-0 h-60 w-60 rounded-full bg-[var(--brand-green)]/10 blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-0 right-0 h-60 w-60 rounded-full bg-[var(--brand-gold)]/10 blur-3xl"></div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl reveal-up">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-gold)]">Why Choose Us</p>
            <h2 class="mt-4 text-3xl font-bold sm:text-4xl">Built for quality, support, and reliable supply.</h2>
            <p class="mt-4 text-base leading-8 text-strong/70">
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
<section class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-white to-green-50/40 py-24">
    <!-- soft bg glow -->
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -left-16 top-10 h-56 w-56 rounded-full bg-green-200/30 blur-3xl"></div>
        <div class="absolute right-0 top-0 h-72 w-72 rounded-full bg-emerald-100/40 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 h-48 w-48 rounded-full bg-lime-100/30 blur-3xl"></div>
    </div>

    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">

        <!-- LEFT CONTENT -->
        <div class="reveal-up">
            <div class="inline-flex items-center gap-2 rounded-full border border-green-200 bg-white/80 px-4 py-2 shadow-sm backdrop-blur">
                <span class="h-2.5 w-2.5 rounded-full bg-[var(--brand-green)]"></span>
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[var(--brand-green)]">
                    Subscribe
                </p>
            </div>

            <h2 class="mt-5 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                Stay in the loop with <span class="text-[var(--brand-green)]">The Farm Care</span>
            </h2>

            <p class="mt-6 max-w-xl text-base leading-8 text-slate-600 sm:text-lg">
                Get product updates, new arrivals, industry news, and business opportunities delivered to your inbox.
                No spam. Just useful updates for buyers, distributors, and partners.
            </p>

            <!-- flash messages -->
            @if(session('newsletter_success'))
                <div class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700 shadow-sm">
                    {{ session('newsletter_success') }}
                </div>
            @endif

            @if($errors->has('newsletter_email'))
                <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-medium text-red-700 shadow-sm">
                    {{ $errors->first('newsletter_email') }}
                </div>
            @endif

            <form method="POST" action="{{ route('newsletter.store') }}"
                  class="mt-8 rounded-[2rem] border border-slate-200 bg-white/90 p-3 shadow-xl backdrop-blur">
                @csrf

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <div class="relative flex-1">
                        <input
                            type="email"
                            name="newsletter_email"
                            value="{{ old('newsletter_email') }}"
                            placeholder="Enter your email address"
                            class="w-full rounded-full border border-slate-200 bg-slate-50 px-5 py-4 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[var(--brand-green)] focus:bg-white focus:ring-4 focus:ring-[var(--brand-green)]/10"
                            required
                        >
                    </div>

                    <button type="submit"
                            class="premium-btn premium-btn-green magnetic-btn inline-flex items-center justify-center rounded-full px-7 py-4 text-sm font-semibold text-strong shadow-lg transition hover:-translate-y-0.5">
                        Subscribe Now
                    </button>
                </div>

                <p class="mt-3 px-2 text-xs leading-6 text-slate-500">
                    By subscribing, you agree to receive occasional product and business updates from The Farm Care.
                </p>
            </form>

            <!-- mini features -->
            <div class="mt-6 flex flex-wrap gap-3">
                <div class="rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-600 shadow-sm">
                    Product Launches
                </div>
                <div class="rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-600 shadow-sm">
                    Export Opportunities
                </div>
                <div class="rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-medium text-slate-600 shadow-sm">
                    New Arrivals
                </div>
            </div>
        </div>

        <!-- RIGHT IMAGE CARD -->
        <div class="reveal-up">
            <div class="group relative overflow-hidden rounded-[2rem] border border-white/60 bg-white/70 p-3 shadow-2xl backdrop-blur-xl">
                <div class="absolute inset-0 bg-gradient-to-tr from-green-100/20 via-transparent to-emerald-100/20"></div>

                <img
                    src="{{ asset('images/sections/newsletter.jpg') }}"
                    alt="Newsletter"
                    class="relative h-[420px] w-full rounded-[1.6rem] object-cover transition duration-700 group-hover:scale-[1.03]"
                >

                <div class="absolute bottom-6 left-6 right-6 rounded-[1.5rem] border border-white/50 bg-white/85 p-5 shadow-xl backdrop-blur-md">
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">
                        Join our network
                    </p>
                    <h3 class="mt-2 text-xl font-bold text-slate-900">
                        Built for buyers, farms, and distributors
                    </h3>
                    <p class="mt-2 text-sm leading-7 text-slate-600">
                        Be the first to know about premium veterinary and farm care products.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CONTACT --}}
<section id="contact" class="bg-slate-950 py-24 relative overflow-hidden">
    {{-- Background Glow --}}
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-[var(--brand-green)]/10 blur-[120px] rounded-full"></div>

    <div class="mx-auto max-w-7xl px-4 relative z-10">
        <div class="grid gap-12 lg:grid-cols-2">
            <div>
                <p class="text-sm font-bold uppercase tracking-widest text-[var(--brand-green)]">Contact</p>
                <h2 class="mt-4 text-4xl font-black text-strong">Get in touch with <span class="text-[var(--brand-green)]">The Farm Care</span></h2>

                <div class="mt-10 space-y-8">
                    {{-- Item: Call --}}
                    <div class="flex items-center gap-6 group">
                        <div class="h-14 w-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-[var(--brand-green)] group-hover:bg-[var(--brand-green)] group-hover:text-strong transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-tighter">Call Us</p>
                            <p class="text-xl font-bold text-strong">+92 300 613 1926</p>
                        </div>
                    </div>

                    {{-- Item: Email --}}
                    <div class="flex items-center gap-6 group">
                        <div class="h-14 w-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-[var(--brand-green)] group-hover:bg-[var(--brand-green)] group-hover:text-strong transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-tighter">Email</p>
                            <p class="text-xl font-bold text-strong">info@thefarmcare.com</p>
                        </div>
                    </div>

                    {{-- Item: Location --}}
                    <div class="flex items-center gap-6 group">
                        <div class="h-14 w-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-[var(--brand-green)] group-hover:bg-[var(--brand-green)] group-hover:text-strong transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-tighter">Location</p>
                            <p class="text-xl font-bold text-strong">Sialkot, 51310 Pakistan</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Form Card --}}
            <div class="bg-white/5 border border-white/10 p-8 rounded-[2.5rem] backdrop-blur-md shadow-2xl">
                <form action="#" class="space-y-6">
                    <input type="text" placeholder="Full Name" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-strong focus:border-[var(--brand-green)] outline-none transition">
                    <input type="email" placeholder="Email Address" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-strong focus:border-[var(--brand-green)] outline-none transition">
                    <textarea rows="4" placeholder="Your Message" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-strong focus:border-[var(--brand-green)] outline-none transition"></textarea>
                    <button class="premium-btn premium-btn-primary w-full rounded-2xl py-4 font-bold text-strong uppercase tracking-widest text-sm">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/farmcare-home.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/farmcare-home.js') }}"></script>
@endpush
