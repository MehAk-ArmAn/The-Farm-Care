@extends('layouts.app')

@section('content')

{{-- HERO / SLIDER --}}
<section
    id="home"
    x-data="{
        current: 0,
        slides: [
            '{{ asset('images/banners/hero-1.jpg') }}',
            '{{ asset('images/banners/hero-2.jpg') }}',
            '{{ asset('images/banners/hero-3.jpg') }}'
        ],
        next() {
            this.current = (this.current + 1) % this.slides.length
        },
        prev() {
            this.current = (this.current - 1 + this.slides.length) % this.slides.length
        }
    }"
    x-init="setInterval(() => next(), 5000)"
    class="relative h-[70vh] overflow-hidden bg-slate-200"
>
    {{-- Slides --}}
    <template x-for="(slide, index) in slides" :key="index">
        <div
            x-show="current === index"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0"
        >
            <img
                :src="slide"
                alt="Farm Care Banner"
                class="h-full w-full object-cover"
            >
        </div>
    </template>

    {{-- Left Arrow --}}
    <button
        @click="prev()"
        class="absolute left-4 top-1/2 z-20 -translate-y-1/2 rounded-full bg-black/35 px-4 py-3 text-2xl font-bold text-white backdrop-blur-sm transition hover:bg-black/55"
        aria-label="Previous Slide"
    >
        &#10094;
    </button>

    {{-- Right Arrow --}}
    <button
        @click="next()"
        class="absolute right-4 top-1/2 z-20 -translate-y-1/2 rounded-full bg-black/35 px-4 py-3 text-2xl font-bold text-white backdrop-blur-sm transition hover:bg-black/55"
        aria-label="Next Slide"
    >
        &#10095;
    </button>

    {{-- Dots --}}
    <div class="absolute bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-3">
        <template x-for="(slide, index) in slides" :key="'dot-' + index">
            <button
                @click="current = index"
                class="h-3 w-3 rounded-full transition"
                :class="current === index ? 'bg-white' : 'bg-white/50'"
                :aria-label="'Go to slide ' + (index + 1)"
            ></button>
        </template>
    </div>
</section>

<section class="bg-white py-16 text-center">
    <div class="mx-auto max-w-4xl px-4">
        <h1 class="text-4xl font-bold text-slate-900 sm:text-5xl">
            The Farm Care
        </h1>

        <p class="mt-4 text-base leading-8 text-slate-600 sm:text-lg">
            Trusted veterinary equipment and animal nutrition solutions from Sialkot, Pakistan.
        </p>

        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="#products" class="rounded-full bg-[var(--brand-green)] px-6 py-3 text-sm font-semibold text-white">
                Explore Products
            </a>

            <a href="#contact" class="rounded-full border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-800">
                Contact Us
            </a>
        </div>
    </div>
</section>

{{-- SUPPORT STRIP --}}
<section class="bg-white py-12">
    <div class="mx-auto grid max-w-7xl gap-6 px-4 text-center sm:grid-cols-2 lg:grid-cols-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
            <img src="{{ asset('images/icons/support.png') }}" alt="24/7 Customer Supports" class="mx-auto h-14 w-14 object-contain">
            <h3 class="mt-4 text-lg font-semibold text-slate-900">24/7 Customer Supports</h3>
            <p class="mt-2 text-sm text-slate-600">Responsive assistance for customers and distributors.</p>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
            <img src="{{ asset('images/icons/quality.png') }}" alt="Quality Products" class="mx-auto h-14 w-14 object-contain">
            <h3 class="mt-4 text-lg font-semibold text-slate-900">Quality Products</h3>
            <p class="mt-2 text-sm text-slate-600">Reliable veterinary and animal care solutions.</p>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
            <img src="{{ asset('images/icons/guarantee.png') }}" alt="Money Back Guarantee" class="mx-auto h-14 w-14 object-contain">
            <h3 class="mt-4 text-lg font-semibold text-slate-900">Money Back Guarantee</h3>
            <p class="mt-2 text-sm text-slate-600">Confidence and trust for buyers and partners.</p>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6">
            <img src="{{ asset('images/icons/shipping.png') }}" alt="Fast Shipping" class="mx-auto h-14 w-14 object-contain">
            <h3 class="mt-4 text-lg font-semibold text-slate-900">Fast Shipping</h3>
            <p class="mt-2 text-sm text-slate-600">Quick dispatch support for domestic and export orders.</p>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section id="about" class="bg-white py-20">
    <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">About The Farm Care</p>
            <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">
                Trusted veterinary equipment and animal nutrition solutions.
            </h2>
            <p class="mt-6 text-base leading-8 text-slate-600">
                The Farm Care is a trusted name in the field of veterinary equipment and animal nutrition solutions, proudly based in Sialkot, Pakistan.
            </p>
            <p class="mt-4 text-base leading-8 text-slate-600">
                Our focus is on quality, reliability, and practical products for farms, clinics, distributors, and international buyers.
            </p>
        </div>

        <div>
            <img src="{{ asset('images/sections/middle.png') }}" alt="The Farm Care" class="h-full w-full rounded-[2rem] object-cover shadow-xl">
        </div>
    </div>
</section>

{{-- CATEGORIES --}}
<section class="bg-[var(--brand-light)] py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">Categories</p>
            <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Main product categories</h2>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="text-xl font-semibold text-slate-900">Dental Instruments</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Professional product category visible on the current website homepage.</p>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="text-xl font-semibold text-slate-900">Veterinary Instruments</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Core veterinary equipment category highlighted on the current homepage.</p>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="text-xl font-semibold text-slate-900">Hunting Knife</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Also listed as a visible homepage category on the current website.</p>
            </div>
        </div>
    </div>
</section>

{{-- PRODUCTS --}}
<section id="products" class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">Products</p>
                <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Featured product showcase</h2>
            </div>
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-[var(--brand-green)]">View all products →</a>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <article class="rounded-[2rem] bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <img src="{{ asset('images/products/product-1.jpg') }}" alt="Product 1" class="h-56 w-full rounded-[1.5rem] object-cover">
                <h3 class="mt-5 text-lg font-semibold text-slate-900">Featured Product 1</h3>
                <p class="mt-3 text-sm text-slate-600">Replace this title with the exact product name from your downloaded product image/content set.</p>
            </article>

            <article class="rounded-[2rem] bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <img src="{{ asset('images/products/product-2.jpg') }}" alt="Product 2" class="h-56 w-full rounded-[1.5rem] object-cover">
                <h3 class="mt-5 text-lg font-semibold text-slate-900">Featured Product 2</h3>
                <p class="mt-3 text-sm text-slate-600">Replace with the exact homepage product title from your old site assets.</p>
            </article>

            <article class="rounded-[2rem] bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <img src="{{ asset('images/products/product-3.jpg') }}" alt="Product 3" class="h-56 w-full rounded-[1.5rem] object-cover">
                <h3 class="mt-5 text-lg font-semibold text-slate-900">Featured Product 3</h3>
                <p class="mt-3 text-sm text-slate-600">Replace with the matching old-site product text after download.</p>
            </article>

            <article class="rounded-[2rem] bg-white p-5 shadow-sm ring-1 ring-slate-200">
                <img src="{{ asset('images/products/product-4.jpg') }}" alt="Product 4" class="h-56 w-full rounded-[1.5rem] object-cover">
                <h3 class="mt-5 text-lg font-semibold text-slate-900">Featured Product 4</h3>
                <p class="mt-3 text-sm text-slate-600">Replace with the matching old-site product text after download.</p>
            </article>
        </div>
    </div>
</section>

{{-- WHY CHOOSE US --}}
<section class="bg-slate-950 py-20 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-gold)]">Why Choose Us</p>
            <h2 class="mt-4 text-3xl font-bold sm:text-4xl">Built for quality, support, and reliable supply.</h2>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3 xl:grid-cols-4">
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 text-center">
                <img src="{{ asset('images/icons/shipping.png') }}" alt="Fast Shipping" class="mx-auto h-14 w-14 object-contain">
                <h3 class="mt-4 text-lg font-semibold">FAST SHIPPING</h3>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 text-center">
                <img src="{{ asset('images/icons/oem.png') }}" alt="OEM" class="mx-auto h-14 w-14 object-contain">
                <h3 class="mt-4 text-lg font-semibold">OEM</h3>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 text-center">
                <img src="{{ asset('images/icons/customization.png') }}" alt="Customization" class="mx-auto h-14 w-14 object-contain">
                <h3 class="mt-4 text-lg font-semibold">CUSTOMIZATION</h3>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 text-center">
                <img src="{{ asset('images/icons/technical.png') }}" alt="Technical Support" class="mx-auto h-14 w-14 object-contain">
                <h3 class="mt-4 text-lg font-semibold">TECHNICAL SUPPORT</h3>
            </div>
        </div>
    </div>
</section>

{{-- NEWSLETTER / CTA --}}
<section class="bg-white py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8 lg:items-center">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">Subscribe</p>
            <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Subscribe to our Newsletter</h2>
            <p class="mt-6 text-base leading-8 text-slate-600">
                Stay connected for product updates, new arrivals, and business opportunities.
            </p>

            <form class="mt-8 flex flex-col gap-4 sm:flex-row">
                <input type="email" placeholder="Enter your email" class="w-full rounded-full border border-slate-300 px-5 py-3 outline-none focus:border-[var(--brand-green)]">
                <button type="button" class="rounded-full bg-[var(--brand-green)] px-6 py-3 text-sm font-semibold text-white">
                    Subscribe
                </button>
            </form>
        </div>

        <div>
            <img src="{{ asset('images/sections/newsletter.jpg') }}" alt="Newsletter" class="h-full w-full rounded-[2rem] object-cover shadow-xl">
        </div>
    </div>
</section>

{{-- CONTACT --}}
<section id="contact" class="bg-[var(--brand-light)] py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-green)]">Contact</p>
            <h2 class="mt-4 text-3xl font-bold text-slate-900 sm:text-4xl">Get in touch with The Farm Care</h2>

            <div class="mt-8 space-y-5">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/icons/emergency-call.png') }}" alt="Call" class="h-6 w-6 object-contain">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Call Us</p>
                        <p class="text-sm text-slate-600">+92 300 613 1926</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/icons/emergency-call.png') }}" alt="Email" class="h-6 w-6 object-contain">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Email</p>
                        <p class="text-sm text-slate-600">info@thefarmcare.com</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/sections/footer.png') }}" alt="Location" class="h-6 w-6 object-contain">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Location</p>
                        <p class="text-sm text-slate-600">Sialkot, 51310 Pakistan</p>
                    </div>
                </div>
            </div>
        </div>

        <form class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
            <div class="grid gap-5 sm:grid-cols-2">
                <input type="text" placeholder="Full Name" class="rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-[var(--brand-green)]">
                <input type="email" placeholder="Email Address" class="rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-[var(--brand-green)]">
                <input type="text" placeholder="Company Name" class="rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-[var(--brand-green)] sm:col-span-2">
                <textarea rows="5" placeholder="Tell us what products you need" class="rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none focus:border-[var(--brand-green)] sm:col-span-2"></textarea>
            </div>

            <button type="button" class="mt-6 rounded-full bg-[var(--brand-green)] px-6 py-3 text-sm font-semibold text-white">
                Send Inquiry
            </button>
        </form>
    </div>
</section>

@endsection
