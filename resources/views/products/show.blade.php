@extends('layouts.app')

@section('content')
<section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2">
            <div>
                <img
                    src="{{ $product->featured_image ? asset('storage/' . $product->featured_image) : asset('images/placeholder.jpg') }}"
                    alt="{{ $product->name }}"
                    class="h-[500px] w-full rounded-3xl object-cover"
                >
            </div>

            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--brand-green)]">
                    {{ $product->category?->name }}
                </p>

                <h1 class="mt-4 text-4xl font-bold text-slate-900">{{ $product->name }}</h1>

                <p class="mt-6 text-slate-600 leading-8">
                    {{ $product->description }}
                </p>

                <div class="mt-8">
                    <a href="#contact-form" class="rounded-full bg-[var(--brand-green)] px-6 py-3 font-semibold text-white">
                        Request Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
