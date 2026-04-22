@extends('layouts.app')

@section('content')
<section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2">
            <div>
                <div class="overflow-hidden rounded-[2rem] bg-slate-100 shadow-xl ring-1 ring-slate-200">
                    <img
                        src="{{ $product->featured_image ? asset('images/products/' . $product->featured_image) : asset('images/placeholder.jpg') }}"
                        alt="{{ $product->name }}"
                        class="w-full object-contain"
                    >
                </div>

                @if($product->images && $product->images->count())
                    <div class="mt-6 grid grid-cols-4 gap-4">
                        @foreach($product->images as $image)
                            <div class="overflow-hidden rounded-2xl bg-slate-100 ring-1 ring-slate-200">
                                <img
                                    src="{{ asset('images/products/' . $image->image_path) }}"
                                    alt="{{ $image->alt_text ?: $product->name }}"
                                    class="h-24 w-full object-cover cursor-zoom-in"
                                    onclick="openPreview(this)"
                                >
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                @if($product->category)
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--brand-green)]">
                        {{ $product->category->name }}
                    </p>
                @endif

                <div class="mt-3 flex flex-wrap items-center gap-3">
                    <h1 class="text-4xl font-bold text-slate-900">{{ $product->name }}</h1>

                    @if($product->is_featured)
                        <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-[var(--brand-green)]">
                            Featured
                        </span>
                    @endif
                </div>

                @if($product->short_title)
                    <p class="mt-3 text-lg font-medium text-slate-500">
                        {{ $product->short_title }}
                    </p>
                @endif

                <p class="mt-6 text-base leading-8 text-slate-600">
                    {{ $product->description ?: 'Detailed product information will appear here once full content is added.' }}
                </p>

                {{-- 🔥 ADD TO INQUIRY FORM --}}
                <form action="{{ route('inquiry.add') }}" method="POST" class="mt-8 flex flex-wrap items-center gap-3">
                    @csrf

                    {{-- Product name hidden --}}
                    <input type="hidden" name="product_name" value="{{ $product->name }}">

                    {{-- Quantity --}}
                    <label class="text-sm font-semibold mr-2">Quantity:</label>
                    <input type="number" name="quantity" value="1" min="1"
                        class="w-24 rounded border border-slate-300 p-2">

                    {{-- Add button --}}
                    <button type="submit"
                            class="px-4 py-2 rounded-full bg-[var(--brand-green)] text-strong font-semibold hover:opacity-90">
                        Add to Inquiry
                    </button>
                </form>

                {{-- ✅ Success message --}}
                @if(session('success'))
                    <p class="mt-2 text-green-600">{{ session('success') }}</p>
                @endif

                {{-- 🔥 PRODUCT OPTIONS SECTION (added, no style changes elsewhere) --}}
                {{-- Shows available variations like types/sizes from DB --}}
                @if($product->options && $product->options->count())
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-slate-900">Available Options</h3>

                        <div class="mt-4 flex flex-wrap gap-3">
                            @foreach($product->options as $option)
                                {{-- Each option displayed as a tag --}}
                                <div class="px-4 py-2 rounded-full border border-slate-300 text-sm text-slate-700 hover:border-[var(--brand-green)] hover:text-[var(--brand-green)] transition">
                                    {{ $option->option_name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-2xl border border-slate-200 p-4">
                        <p class="text-sm font-semibold text-slate-900">Category</p>
                        <p class="mt-2 text-sm text-slate-600">{{ $product->category?->name ?: 'General' }}</p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 p-4">
                        <p class="text-sm font-semibold text-slate-900">Availability</p>
                        <p class="mt-2 text-sm text-slate-600">{{ $product->is_active ? 'Available for inquiry' : 'Currently unavailable' }}</p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 p-4">
                        <p class="text-sm font-semibold text-slate-900">OEM</p>
                        <p class="mt-2 text-sm text-slate-600">Discuss on request</p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 p-4">
                        <p class="text-sm font-semibold text-slate-900">Support</p>
                        <p class="mt-2 text-sm text-slate-600">Technical assistance available</p>
                    </div>
                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a
                        href="{{ route('contact.form') }}?product={{ urlencode($product->name) }}"
                        class="rounded-full bg-[var(--brand-green)] px-6 py-3 font-semibold text-strong transition hover:opacity-90"
                    >
                        Request Quote
                    </a>

                    <a
                        href="{{ route('products.index') }}"
                        class="rounded-full border border-slate-300 px-6 py-3 font-semibold text-slate-800 transition hover:border-[var(--brand-green)] hover:text-[var(--brand-green)]"
                    >
                        Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[var(--brand-light)] py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-3">
            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
                <h3 class="text-xl font-semibold text-slate-900">Why This Product</h3>
                <p class="mt-4 text-sm leading-7 text-slate-600">
                    Presented as a reliable, professionally positioned product suitable for buyer inquiries, category exploration, and supply discussions.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
                <h3 class="text-xl font-semibold text-slate-900">Buyer Confidence</h3>
                <p class="mt-4 text-sm leading-7 text-slate-600">
                    Add trust through better presentation, cleaner descriptions, strong imagery, and a clear inquiry path for direct or wholesale buyers.
                </p>
            </div>

            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-slate-200">
                <h3 class="text-xl font-semibold text-slate-900">Inquiry Ready</h3>
                <p class="mt-4 text-sm leading-7 text-slate-600">
                    Encourage bulk orders, distributor conversations, and technical support questions directly from this product page.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- =========================================================
   BUSINESS INQUIRY SECTION
   SAME EXACT STYLE AS THE BULK QUANTITIES BLOCK
   ========================================================= --}}
<section class="bg-slate-950 py-20 text-strong">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">

        {{-- Left content --}}
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-[var(--brand-gold)]">
                Business Inquiry
            </p>

            <h2 class="mt-4 text-3xl font-bold sm:text-4xl">
                Interested in this product for your business?
            </h2>

            <p class="mt-6 text-base leading-8 text-slate-300">
                Contact The Farm Care for pricing, product discussions, supply requirements,
                and long-term buying opportunities.
            </p>
        </div>

        {{-- Right side card --}}
        <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 backdrop-blur-sm">
            <div class="space-y-4 text-sm text-slate-200">
                <p>• Pricing and quotation requests</p>
                <p>• Bulk purchase discussions</p>
                <p>• Distributor and reseller inquiries</p>
                <p>• Product availability and export questions</p>
            </div>

            <div class="mt-8 flex flex-wrap gap-4">
                <a
                    href="{{ route('contact.form') }}?product={{ urlencode($product->name) }}"
                    class="inline-flex rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition hover:opacity-90"
                >
                    Contact Sales
                </a>

                <a
                    href="{{ route('products.index') }}"
                    class="inline-flex rounded-full border border-white/20 px-6 py-3 text-sm font-semibold text-strong transition hover:bg-white/10"
                >
                    View More Products
                </a>
            </div>
        </div>
    </div>
</section>

<!-- IMAGE MODAL -->
<div id="imagePreview"
     class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/80">

    <img id="previewImg"
         class="max-h-[85%] max-w-[85%] rounded-2xl shadow-2xl">

</div>

<script>
const modal = document.getElementById('imagePreview');
const modalImg = document.getElementById('previewImg');

function openPreview(img) {
    modalImg.src = img.src;      // set image
    modal.classList.remove('hidden');
    modal.classList.add('flex');  // show modal
}

// close when clicking anywhere outside image
modal.addEventListener('click', (e) => {
    if (e.target !== modalImg) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
});

// close on ESC
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
});
</script>

@endsection
