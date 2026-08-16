@extends('layouts.app')

@section('title', $page?->seo_title ?: 'Contact | The Farm Care')
@section('meta_description', $page?->seo_description ?: ($page?->subheading ?? 'Contact The Farm Care'))

@section('content')
@php($content = $page?->content ?? [])
<section class="page-hero page-hero-v11">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('home') }}">{{ $siteSettings['nav_home'] ?? 'Home' }}</a><span>/</span><span>{{ $siteSettings['nav_contact'] ?? 'Contact' }}</span></div>
        <span class="page-kicker-v11">{{ $content['page_kicker'] ?? 'Buyer & Product Support' }}</span>
        <h1>{{ $page?->heading }}</h1>
        <p>{{ $page?->subheading }}</p>
    </div>
</section>

<section class="section contact-section-v11">
    <div class="container contact-grid contact-grid-v11">
        <div class="contact-stack contact-stack-v11">
            <a class="contact-box contact-box-v11" href="mailto:{{ $siteSettings['email'] ?? '' }}"><span class="contact-icon-v11"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18v12H3z"></path><path d="m4 7 8 6 8-6"></path></svg></span><div><b>Email</b><span>{{ $siteSettings['email'] ?? '' }}</span></div></a>
            <a class="contact-box contact-box-v11" href="tel:{{ preg_replace('/[^+0-9]/', '', $siteSettings['phone'] ?? '') }}"><span class="contact-icon-v11"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3h3l2 5-2 2a14 14 0 0 0 4 4l2-2 5 2v3c0 2-2 4-4 4C9 21 3 15 3 7c0-2 2-4 4-4z"></path></svg></span><div><b>Phone / WhatsApp</b><span>{{ $siteSettings['phone'] ?? '' }}</span></div></a>
            <div class="contact-box contact-box-v11"><span class="contact-icon-v11"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 11 9-7 9 7"></path><path d="M5 10v10h14V10"></path><path d="M9 20v-6h6v6"></path></svg></span><div><b>{{ $siteSettings['pakistan_office_label'] ?? 'Pakistan Office' }}</b><span>{!! nl2br(e($siteSettings['pakistan_office'] ?? '')) !!}</span></div></div>
            <div class="contact-box contact-box-v11"><span class="contact-icon-v11"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-6 7-12a7 7 0 1 0-14 0c0 6 7 12 7 12z"></path><circle cx="12" cy="9" r="2.5"></circle></svg></span><div><b>{{ $siteSettings['australia_office_label'] ?? 'Australia Office' }}</b><span>{!! nl2br(e($siteSettings['australia_office'] ?? '')) !!}</span></div></div>
        </div>

        <div class="content-card contact-cta-card contact-cta-card-v11">
            <span class="premium-kicker dark">{{ $content['choice_kicker'] ?? '' }}</span>
            <h2>{{ $content['choice_heading'] ?? '' }}</h2>
            <p>{{ $content['choice_text'] ?? '' }}</p>
            <div class="contact-choice-grid-v11">
                <a href="{{ route('quote') }}"><strong>{{ $content['quote_heading'] ?? '' }}</strong><span>{{ $content['quote_text'] ?? '' }}</span><b>{{ $content['quote_button'] ?? 'Start quote' }} →</b></a>
                <a href="{{ route('inquiry') }}"><strong>{{ $content['inquiry_heading'] ?? '' }}</strong><span>{{ $content['inquiry_text'] ?? '' }}</span><b>{{ $content['inquiry_button'] ?? 'Send inquiry' }} →</b></a>
            </div>
        </div>
    </div>
</section>
@endsection
