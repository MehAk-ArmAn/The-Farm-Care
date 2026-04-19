@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 pb-20">
    <!-- head -->
    <section class="relative overflow-hidden bg-slate-950 pt-24 pb-12 text-strong">
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('images/banners/hero-2.jpg') }}" class="h-full w-full object-cover">
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--brand-green)]">Admin Portal</p>
                    <h1 class="mt-2 text-4xl font-bold tracking-tight">Category Management</h1>
                </div>

                <a href="{{ route('admin.categories.create') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-[var(--brand-green)] px-8 py-4 text-sm font-bold text-strong shadow-lg transition hover:scale-105 hover:bg-green-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add New Category
                </a>
            </div>
        </div>
    </section>

    <!-- body -->
    <section class="mt-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-8 rounded-2xl bg-green-50 p-4 text-sm font-semibold text-green-700 ring-1 ring-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if($categories->count())
                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach($categories as $category)
                        <article class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-slate-200 transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <!-- name -->
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h3 class="text-xl font-semibold text-slate-900">{{ $category->name }}</h3>
                                    <p class="mt-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">
                                        {{ $category->slug }}
                                    </p>
                                </div>

                                @if($category->is_active)
                                    <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-[var(--brand-green)]">
                                        Active
                                    </span>
                                @else
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                                        Inactive
                                    </span>
                                @endif
                            </div>

                            <!-- desc -->
                            <p class="mt-4 min-h-[72px] text-sm leading-7 text-slate-600">
                                {{ $category->description ?: 'No description added yet.' }}
                            </p>

                            <!-- actions -->
                            <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-4">
                                <span class="text-sm font-semibold text-slate-500">
                                    ID: #{{ $category->id }}
                                </span>

                                <div class="flex gap-2">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                       class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-[var(--brand-green)] hover:text-strong">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="rounded-full bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 transition hover:bg-red-100">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $categories->links() }}
                </div>
            @else
                <div class="rounded-[2rem] bg-white p-12 text-center shadow-sm ring-1 ring-slate-200">
                    <h3 class="text-2xl font-bold text-slate-900">No categories yet</h3>
                    <p class="mt-4 text-slate-600">Start by creating your first product category.</p>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
