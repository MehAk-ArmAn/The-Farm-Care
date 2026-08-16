@extends('layouts.app')

@section('title', $page?->seo_title ?: 'The Farm Care | Veterinary Equipment')
@section('meta_description', $page?->seo_description ?: '')

@section('content')
@php
    $content = $page?->content ?? [];
    $heading = $page?->heading ?? 'Reliable Veterinary Equipment & Animal Nutrition Solutions';
@endphp

<main>
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-copy">
                <div class="eyebrow">{{ $content['eyebrow'] ?? 'Trusted Since 2011 • Export Ready Supply' }}</div>
                <h1>
                    {{ \Illuminate\Support\Str::before($heading, 'Nutrition Solutions') }}
                    <span class="green">{{ \Illuminate\Support\Str::contains($heading, 'Nutrition Solutions') ? 'Nutrition Solutions' : '' }}</span>
                </h1>
                <p>{{ $page?->subheading }}</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="{{ route('products.index') }}">{{ $content['hero_primary_label'] ?? 'Explore Products' }}</a>
                    <a class="btn btn-outline" href="{{ route('contact') }}">{{ $content['hero_secondary_label'] ?? 'Contact Us' }}</a>
                </div>
            </div>

            <div class="hero-visual hero-visual-v12" aria-label="The Farm Care veterinary equipment range">
                <img class="hero-image-v12" src="{{ asset('assets/images/hero-products.png') }}" alt="The Farm Care veterinary equipment range" width="1200" height="900" loading="eager" fetchpriority="high">
                <div class="hero-badge hero-badge-v12">{{ $content['hero_badge'] ?? 'Veterinary + Nutrition' }}</div>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="container stats-grid">
            @for($i = 1; $i <= 4; $i++)
                <div class="stat">
                    <div class="stat-icon">✓</div>
                    <div><strong>{{ $siteSettings['hero_stat_'.$i.'_value'] ?? '' }}</strong><span>{{ $siteSettings['hero_stat_'.$i.'_label'] ?? '' }}</span></div>
                </div>
            @endfor
        </div>
    </section>

    <section class="section home-intro-v13">
        <div class="container content-grid content-grid-v13">
            <div class="content-card content-card-v13">
                <span class="premium-kicker dark">{{ $content['intro_kicker'] ?? 'About The Farm Care' }}</span>
                <h2>{{ $content['intro_heading'] ?? 'Trusted veterinary equipment and animal nutrition solutions.' }}</h2>
                <p>{{ $content['intro_text'] ?? '' }}</p>
            </div>
            <div class="content-card premium-side-card content-card-v13">
                <div class="home-intro-points-v13">
                    @for($i=1;$i<=2;$i++)
                        <div>
                            <strong>{{ $content['intro_point_'.$i.'_heading'] ?? '' }}</strong>
                            <span>{{ $content['intro_point_'.$i.'_text'] ?? '' }}</span>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <section class="section home-categories-v13">
        <div class="container">
            <div class="section-head">
                <h2>{{ $content['categories_heading'] ?? 'Explore Our Core Product Categories' }}</h2>
                <p>{{ $content['categories_subheading'] ?? '' }}</p>
            </div>

            <div class="category-grid">
                @foreach($categories as $category)
                    <a class="category-card" href="{{ route('products.index', ['category' => $category->slug]) }}">
                        <img src="{{ $category->image ? \App\Support\MediaUrl::make($category->image) : asset('assets/images/logo.png') }}" alt="{{ $category->name }}" width="420" height="420" loading="lazy">
                        <div>
                            <h3>{{ $category->name }}</h3>
                            <p>{{ $category->description }}</p>
                            <span class="category-product-count">{{ $category->products->count() }} products</span>
                            <span class="text-link">{{ $content['category_link_label'] ?? 'Explore category' }} →</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section why">
        <div class="container">
            <div class="section-head"><h2>{{ $content['why_section_heading'] ?? 'Why Choose The Farm Care?' }}</h2></div>
            @php($whyIcons = ['🎧', '🏅', '🛡️', '🚚'])
            <div class="why-grid">
                @for($i = 1; $i <= 4; $i++)
                    <div class="why-card">
                        <div class="why-icon">{{ $whyIcons[$i - 1] }}</div>
                        <h3>{{ $content['why_'.$i.'_heading'] ?? '' }}</h3>
                        <p>{{ $content['why_'.$i.'_text'] ?? '' }}</p>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="container partner">
            <div class="partner-copy">
                <h2>{{ $content['partner_heading'] ?? '' }}</h2>
                <p>{{ $content['partner_text'] ?? '' }}</p>
                <a class="btn btn-primary" href="{{ route('quote') }}">{{ $content['partner_button_label'] ?? 'Request Bulk Quote' }} →</a>
            </div>
            <img src="{{ asset('assets/images/partner.png') }}" alt="Business partnership" width="1200" height="700" loading="lazy">
        </div>
    </section>
</main>
@endsection
