@extends('layouts.app')

@section('content')
<section class="relative overflow-hidden bg-slate-950">
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero-farm.jpg') }}" alt="Farm" class="h-full w-full object-cover opacity-30">
    </div>

    <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8 lg:py-32">
        <div class="max-w-3xl text-white">
            <span class="rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em]">
                Trusted Since 2011
            </span>

            <h1 class="mt-6 text-4xl font-bold leading-tight sm:text-5xl lg:text-6xl">
                Premium Veterinary Equipment and Animal Nutrition Solutions
            </h1>

            <p class="mt-6 text-lg leading-8 text-slate-200">
                Modern, reliable, and export-ready farm care products for veterinary stores, clinics, and livestock businesses.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('products.index') }}" class="rounded-full bg-[var(--brand-green)] px-6 py-3 font-semibold text-white">
                    Explore Products
                </a>

                <a href="#contact" class="rounded-full border border-white/20 bg-white/10 px-6 py-3 font-semibold text-white">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-20" id="about">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-slate-900">About The Farm Care</h2>
        <p class="mt-6 max-w-3xl text-slate-600 leading-8">
            The Farm Care is a trusted name in veterinary equipment and animal nutrition solutions, proudly based in Sialkot, Pakistan.
        </p>
    </div>
</section>

<section class="bg-[var(--brand-light)] py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <h2 class="text-3xl font-bold text-slate-900">Featured Products</h2>
            <a href="{{ route('products.index') }}" class="font-semibold text-[var(--brand-green)]">View All</a>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach($featuredProducts as $product)
                <article class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                    <img
                        src="{{ $product->featured_image ? asset('storage/' . $product->featured_image) : asset('images/placeholder.jpg') }}"
                        alt="{{ $product->name }}"
                        class="h-56 w-full rounded-2xl object-cover"
                    >

                    <h3 class="mt-5 text-xl font-semibold text-slate-900">{{ $product->name }}</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">
                        {{ $product->short_description }}
                    </p>

                    <a href="{{ route('products.show', $product->slug) }}" class="mt-4 inline-block font-semibold text-[var(--brand-green)]">
                        View Product →
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="contact" class="bg-white py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Send Inquiry</h2>
            <p class="mt-4 text-slate-600 leading-8">
                Contact us for products, distribution, and export inquiries.
            </p>
        </div>

        <form action="{{ route('inquiry.store') }}" method="POST" class="rounded-3xl border border-slate-200 bg-slate-50 p-8">
            @csrf

            <div class="grid gap-4">
                <input type="text" name="name" placeholder="Full Name" class="rounded-2xl border border-slate-200 px-4 py-3">
                <input type="email" name="email" placeholder="Email Address" class="rounded-2xl border border-slate-200 px-4 py-3">
                <input type="text" name="company" placeholder="Company Name" class="rounded-2xl border border-slate-200 px-4 py-3">
                <input type="text" name="country" placeholder="Country" class="rounded-2xl border border-slate-200 px-4 py-3">
                <textarea name="message" rows="5" placeholder="Your message" class="rounded-2xl border border-slate-200 px-4 py-3"></textarea>

                <button type="submit" class="rounded-full bg-[var(--brand-green)] px-6 py-3 font-semibold text-white">
                    Send Inquiry
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
