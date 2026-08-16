@extends('layouts.app')

@section('title', $page?->seo_title ?: 'Products | The Farm Care')
@section('meta_description', $page?->seo_description ?: ($page?->subheading ?? 'Browse The Farm Care products'))

@section('content')
@php
    $selectedCategory = request('category') ? $categories->firstWhere('slug', request('category')) : null;
    $content = $page?->content ?? [];
@endphp

<section class="page-hero catalog-hero-v10">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">{{ $siteSettings['nav_home'] ?? 'Home' }}</a><span>/</span><span>{{ $siteSettings['nav_products'] ?? 'Products' }}</span>
            @if($selectedCategory)<span>/</span><span>{{ $selectedCategory->name }}</span>@endif
        </div>
        <div class="catalog-hero-row-v10">
            <div>
                <span class="catalog-eyebrow-v10">{{ $content['page_kicker'] ?? 'Professional Veterinary & Livestock Equipment' }}</span>
                <h1>{{ $selectedCategory?->name ?? ($page?->heading ?? 'Our Products') }}</h1>
                <p>{{ $selectedCategory?->description ?? ($page?->subheading ?? '') }}</p>
            </div>
            <div class="catalog-total-v10"><strong>{{ $products->total() }}</strong><span>{{ $products->total() === 1 ? 'Product' : 'Products' }}</span></div>
        </div>
    </div>
</section>

<section class="section catalog-section catalog-section-v10">
    <div class="container products-layout products-layout-v10">
        <aside class="sidebar sidebar-v10">
            <div class="sidebar-title-v10"><span>{{ $content['sidebar_kicker'] ?? 'Browse' }}</span><h3>{{ $content['sidebar_heading'] ?? 'Product Categories' }}</h3></div>
            <div class="filters filters-v10">
                <a class="filter-btn {{ !request('category') ? 'active' : '' }}" href="{{ route('products.index') }}"><span>{{ $content['all_products_label'] ?? 'All Products' }}</span></a>
                @foreach($categories as $category)
                    <a class="filter-btn {{ request('category') === $category->slug ? 'active' : '' }}" href="{{ route('products.index', ['category' => $category->slug]) }}"><span>{{ $category->name }}</span><span class="filter-count">{{ $category->products_count ?? 0 }}</span></a>
                @endforeach
            </div>
        </aside>

        <div class="catalog-main">
            <div class="catalog-toolbar catalog-toolbar-v10">
                <div class="catalog-toolbar-copy-v10"><strong>{{ $selectedCategory?->name ?? ($content['all_products_label'] ?? 'All Products') }}</strong><span>{{ $content['toolbar_text'] ?? '' }}</span></div>
                <form class="search-box search-box-v10" method="get">
                    @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                    <input name="q" value="{{ request('q') }}" placeholder="{{ $content['search_placeholder'] ?? 'Search products...' }}" aria-label="Search products">
                    <button type="submit" aria-label="Search">{{ $content['search_button'] ?? 'Search' }}</button>
                </form>
            </div>

            <div class="product-grid product-grid-v10">
                @forelse($products as $product)
                    <article class="product-card product-card-v10">
                        <a class="product-img product-img-v10" href="{{ route('products.show', $product->slug) }}">
                            <img src="{{ \App\Support\MediaUrl::make($product->image) }}" alt="{{ $product->name }}" width="1200" height="1200" loading="lazy" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo.png') }}';">
                        </a>
                        <div class="product-body product-body-v10">
                            <span class="badge">{{ $product->category->name }}</span>
                            <h3><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                            <p>{{ $product->short_description }}</p>
                            <div class="product-actions product-actions-v10"><a class="btn btn-primary btn-sm" href="{{ route('products.show', $product->slug) }}">{{ $content['view_product_label'] ?? 'View Product' }} <span aria-hidden="true">→</span></a></div>
                        </div>
                    </article>
                @empty
                    <div class="content-card empty-catalog-card empty-catalog-card-v10">
                        <h3>{{ $content['empty_heading'] ?? 'No matching products' }}</h3>
                        <p>{{ $content['empty_text'] ?? 'Try another category or clear the search term.' }}</p>
                        <a class="btn btn-outline" href="{{ route('products.index') }}">{{ $content['empty_button'] ?? 'View All Products' }}</a>
                    </div>
                @endforelse
            </div>
            <div class="pagination-wrap">{{ $products->links('components.pagination') }}</div>
        </div>
    </div>
</section>
@endsection
