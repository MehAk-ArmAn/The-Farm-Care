@extends('layouts.app')

@section('title', $page?->seo_title ?: 'About | The Farm Care')
@section('meta_description', $page?->seo_description ?: ($page?->subheading ?? 'About The Farm Care'))

@section('content')
@php($content = $page?->content ?? [])
<section class="page-hero page-hero-v11">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('home') }}">{{ $siteSettings['nav_home'] ?? 'Home' }}</a><span>/</span><span>{{ $siteSettings['nav_about'] ?? 'About' }}</span></div>
        <span class="page-kicker-v11">{{ $content['page_kicker'] ?? 'The Farm Care' }}</span>
        <h1>{{ $page?->heading }}</h1>
        <p>{{ $page?->subheading }}</p>
    </div>
</section>

<section class="section about-section-v11">
    <div class="container content-grid content-grid-v11">
        <article class="content-card content-card-v11">
            <span class="premium-kicker dark">{{ $content['section_kicker'] ?? 'Who We Serve' }}</span>
            <h2>{{ $content['section_heading'] ?? '' }}</h2>
            <p>{{ $content['body'] ?? '' }}</p>
            <div class="about-buyer-grid-v11">
                @for($i=1;$i<=4;$i++)
                    <div><strong>{{ $content['buyer_'.$i.'_heading'] ?? '' }}</strong><span>{{ $content['buyer_'.$i.'_text'] ?? '' }}</span></div>
                @endfor
            </div>
        </article>

        <aside class="content-card premium-side-card premium-side-card-v11">
            <span class="premium-kicker dark">{{ $content['supply_kicker'] ?? 'Our Supply Approach' }}</span>
            <h2>{{ $content['supply_heading'] ?? '' }}</h2>
            <ul class="checklist checklist-v11">
                @for($i=1;$i<=4;$i++)
                    @if(!empty($content['supply_'.$i]))<li>{{ $content['supply_'.$i] }}</li>@endif
                @endfor
            </ul>
            <div class="office-mini-v11">
                <div><span>{{ $siteSettings['pakistan_office_label'] ?? 'Pakistan Office' }}</span><strong>{!! nl2br(e($siteSettings['pakistan_office'] ?? '')) !!}</strong></div>
                <div><span>{{ $siteSettings['australia_office_label'] ?? 'Australia Office' }}</span><strong>{!! nl2br(e($siteSettings['australia_office'] ?? '')) !!}</strong></div>
            </div>
        </aside>
    </div>
</section>
@endsection
