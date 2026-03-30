@extends('layouts.app')

@section('content')
<section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-slate-900">Our Products</h1>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            @foreach($products as $product)
                <article class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                    <img
                        src="{{ $product->featured_image ? asset('storage/' . $product->featured_image) : asset('images/placeholder.jpg') }}"
                        alt="{{ $product->name }}"
                        class="h-56 w-full rounded-2xl object-cover"
                    >

                    <h3 class="mt-5 text-xl font-semibold text-slate-900">{{ $product->name }}</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $product->short_description }}</p>

                    <a href="{{ route('products.show', $product->slug) }}" class="mt-4 inline-block font-semibold text-[var(--brand-green)]">
                        View Product →
                    </a>
                </article>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
