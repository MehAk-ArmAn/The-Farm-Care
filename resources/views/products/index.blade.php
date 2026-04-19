@extends('layouts.app')

@section('content')
<section class="relative overflow-hidden bg-slate-950 pt-32 text-strong md:pt-36">
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/banners/hero-2.jpg') }}"
            alt="Products Banner"
            class="h-full w-full object-cover opacity-88"
        >
        <div class="absolute inset-0 bg-slate-950/60"></div>
    </div>
</section>

<section class="border-b border-slate-200 bg-white py-8">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--brand-green)]">Catalog Overview</p>
            <h2 class="mt-2 text-2xl font-bold text-slate-900">Browse Our Products</h2>
        </div>

        <div class="flex flex-wrap gap-3">
            <span class="rounded-full bg-green-50 px-4 py-2 text-sm font-semibold text-[var(--brand-green)]">
                {{ $products->total() }} Products
            </span>

            @if($products->count())
                <span class="rounded-full border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700">
                    Page {{ $products->currentPage() }} of {{ $products->lastPage() }}
                </span>
            @endif
        </div>
    </div>
</section>

<section class="bg-[var(--brand-light)] py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @if($products->count())
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach($products as $product)
                    <article class="group overflow-hidden rounded-[2rem] bg-white p-5 shadow-sm ring-1 ring-slate-200 transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="overflow-hidden rounded-[1.5rem] bg-slate-100">
                            <img
                                src="{{ $product->featured_image ? asset('images/products/' . $product->featured_image) : asset('images/placeholder.jpg') }}"
                                alt="{{ $product->name }}"
                                class="mx-auto object-cover transition duration-500 group-hover:scale-105"
                            >
                        </div>

                        <div class="mt-5 flex items-start justify-between gap-3">
                            <div>
                                @if($product->category)
                                    <p class="mb-2 text-xs font-semibold uppercase tracking-[0.2em] text-[var(--brand-green)]">
                                        {{ $product->category->name }}
                                    </p>
                                @endif

                                <h3 class="text-xl font-semibold text-slate-900">
                                    {{ $product->name }}
                                </h3>
                            </div>

                            @if($product->is_featured)
                                <span class="shrink-0 rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-[var(--brand-green)]">
                                    Featured
                                </span>
                            @endif
                        </div>

                        <p class="mt-3 min-h-[84px] text-sm leading-7 text-slate-600">
                            {{ $product->description  }}
                        </p>

                        <div class="mt-6 flex items-center justify-between">
                            <a
                                href="{{ route('products.show', $product->slug) }}"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-[var(--brand-green)] transition hover:gap-3"
                            >
                                View Product
                                <span>→</span>
                            </a>

                            <a href="{{ route('contact.form') }}?product={{ urlencode($product->name) }}"
                            class="rounded-full border border-slate-300 px-4 py-2 text-xs font-semibold text-slate-700 transition hover:border-[var(--brand-green)] hover:text-[var(--brand-green)]">
                            Request Quote
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $products->links() }}
            </div>
        @else
            <div class="rounded-[2rem] bg-white p-12 text-center shadow-sm ring-1 ring-slate-200">
                <h3 class="text-2xl font-bold text-slate-900">No products available yet</h3>
                <p class="mt-4 text-slate-600">
                    Start adding products from the admin panel to display them here.
                </p>
            </div>
        @endif
    </div>
</section>

<section class="bg-white py-20">
    <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:grid-cols-4 lg:px-8">
        <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-6 text-center">
            <img src="{{ asset('images/icons/quality.png') }}" alt="Quality Products" class="mx-auto h-12 w-12 object-contain">
            <h3 class="mt-4 text-lg font-semibold text-slate-900">Quality Products</h3>
            <p class="mt-2 text-sm leading-7 text-slate-600">Built for confidence, consistency, and professional presentation.</p>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-6 text-center">
            <img src="{{ asset('images/icons/shipping.png') }}" alt="Fast Shipping" class="mx-auto h-12 w-12 object-contain">
            <h3 class="mt-4 text-lg font-semibold text-slate-900">Fast Shipping</h3>
            <p class="mt-2 text-sm leading-7 text-slate-600">Supporting domestic orders and export-oriented supply flow.</p>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-6 text-center">
            <img src="{{ asset('images/icons/oem.png') }}" alt="OEM" class="mx-auto h-12 w-12 object-contain">
            <h3 class="mt-4 text-lg font-semibold text-slate-900">OEM Support</h3>
            <p class="mt-2 text-sm leading-7 text-slate-600">Ideal for long-term buyers and private-label discussions.</p>
        </div>

        <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-6 text-center">
            <img src="{{ asset('images/icons/technical.png') }}" alt="Technical Support" class="mx-auto h-12 w-12 object-contain">
            <h3 class="mt-4 text-lg font-semibold text-slate-900">Technical Support</h3>
            <p class="mt-2 text-sm leading-7 text-slate-600">Clear communication and buyer-friendly product support.</p>
        </div>
    </div>
</section>

<section class="bg-slate-950 py-20 text-strong">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8 lg:items-center">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-gold)]">Need Bulk Quantities?</p>
            <h2 class="mt-4 text-3xl font-bold sm:text-4xl">
                Let’s discuss supply, distribution, or product-specific requirements.
            </h2>
            <p class="mt-6 text-base leading-8 text-slate-300">
                Whether you are a direct buyer, distributor, clinic, or wholesale partner, The Farm Care is ready to support your product inquiries professionally.
            </p>
        </div>

        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 backdrop-blur-sm">
            <div class="space-y-4 text-sm text-slate-200">
                <p>• Bulk order discussions</p>
                <p>• Distributor partnerships</p>
                <p>• OEM and customization inquiries</p>
                <p>• Export and product availability questions</p>
            </div>

            <a
                href="{{ route('contact.form') }}"
                class="mt-8 inline-flex rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition hover:opacity-90"
            >
                Contact Sales
            </a>
        </div>
    </div>
</section>
@endsection
