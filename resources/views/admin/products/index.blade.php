@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 pb-20">
    <!-- Header Section -->
    <section class="relative overflow-hidden bg-slate-950 pt-24 pb-12 text-strong">
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('images/banners/hero-2.jpg') }}" class="h-full w-full object-cover">
        </div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--brand-green)]">Admin Portal</p>
                    <h1 class="mt-2 text-4xl font-bold tracking-tight">Product Management</h1>
                </div>
                <a href="{{ route('admin.products.create') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-[var(--brand-green)] px-8 py-4 text-sm font-bold text-strong shadow-lg transition hover:scale-105 hover:bg-green-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Add New Product
                </a>
            </div>
        </div>
    </section>

        <!-- Stats Bar -->
    <div class="relative z-10 mx-auto -mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total Items Card -->
            <div class="flex items-center gap-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/50">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-green-50 text-[var(--brand-green)]">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 11v.01"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Total Catalog</p>
                    <p class="text-3xl font-black text-slate-900">{{ $products->total() }} <span class="text-sm font-medium text-slate-500">Items</span></p>
                </div>
            </div>

            <!-- You can add more cards here easily -->
            <div class="hidden lg:flex items-center gap-5 rounded-3xl border border-slate-200 bg-white/50 p-6 backdrop-blur-sm sm:flex">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest">Status</p>
                    <p class="text-lg font-bold text-slate-600">System Live</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Product Grid -->
    <section class="mt-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-8 rounded-2xl bg-green-50 p-4 text-sm font-semibold text-green-700 ring-1 ring-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if($products->count())
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($products as $product)
                        <article class="group relative flex flex-col overflow-hidden rounded-[2.5rem] bg-white p-4 shadow-sm ring-1 ring-slate-200 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                            <!-- Image Wrapper -->
                            <div class="relative aspect-square overflow-hidden rounded-[2rem] bg-slate-100">
                                <img src="{{ $product->featured_image ? asset('images/products/' . $product->featured_image) : asset('images/placeholder.jpg') }}"
                                     alt="{{ $product->name }}"
                                     class="h-full w-full object-cover transition duration-700 group-hover:scale-110">

                                <div class="absolute top-4 right-4">
                                    <span class="rounded-full bg-white/90 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-900 backdrop-blur">
                                        ID: #{{ $product->id }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex flex-1 flex-col p-4">
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-[var(--brand-green)] transition">
                                    {{ $product->name }}
                                </h3>
                                <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-slate-500">
                                    {{ $product->description }}
                                </p>

                                <div class="mt-auto pt-6 flex items-center justify-between border-t border-slate-100">
                                    <span class="text-lg font-bold text-slate-900">
                                        ${{ number_format($product->price ?? 0, 2) }}
                                    </span>
                                    <div class="flex gap-2">
                                        <!-- Edit -->
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="rounded-full bg-slate-100 p-2 text-slate-600 transition hover:bg-[var(--brand-green)] hover:text-strong">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('You sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="rounded-full bg-red-100 p-2 text-red-600 transition hover:bg-red-600 hover:text-white">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-16">
                    {{ $products->links() }}
                </div>
            @else
                <div class="flex flex-col items-center justify-center rounded-[3rem] border-2 border-dashed border-slate-200 bg-white py-24 text-center">
                    <div class="rounded-full bg-slate-50 p-6 text-slate-300">
                        <svg class="mx-auto h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-slate-900">Your inventory is empty</h3>
                    <p class="mt-2 text-slate-500">Ready to showcase your instruments? Click the button above.</p>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
