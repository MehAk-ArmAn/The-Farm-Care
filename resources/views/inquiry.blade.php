@extends('layouts.app')

@section('title', $page?->seo_title ?: ucfirst($type).' | The Farm Care')
@section('meta_description', $page?->seo_description ?: ($page?->subheading ?? 'Contact The Farm Care'))

@section('content')
@php($content = $page?->content ?? [])
<section class="page-hero page-hero-v11 request-hero-v11">
    <div class="container">
        <div class="breadcrumb"><a href="{{ route('home') }}">{{ $siteSettings['nav_home'] ?? 'Home' }}</a><span>/</span><span>{{ $page?->title ?? ucfirst($type) }}</span></div>
        <span class="page-kicker-v11">{{ $content['page_kicker'] ?? '' }}</span>
        <h1>{{ $page?->heading }}</h1>
        <p>{{ $page?->subheading }}</p>
    </div>
</section>

<section class="section request-section request-section-v11 {{ $type === 'quote' ? 'request-section-quote' : '' }}">
    <div class="container request-layout-v11">
        <div class="request-guide-v11">
            <span class="premium-kicker dark">{{ $content['guide_kicker'] ?? '' }}</span>
            <h2>{{ $content['guide_heading'] ?? '' }}</h2>
            <div class="request-guide-list-v11">
                @for($i=1;$i<=4;$i++)
                    <div><span>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span><p><strong>{{ $content['step_'.$i.'_title'] ?? '' }}</strong>{{ $content['step_'.$i.'_text'] ?? '' }}</p></div>
                @endfor
            </div>
        </div>

        <form class="form-card form-card-v11 {{ $type === 'quote' ? 'quote-form-card' : '' }}" method="post" action="{{ route('requests.store') }}">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">

            @if($errors->any())<div class="flash flash-error">{{ $errors->first() }}</div>@endif

            <div class="form-card-heading">
                <span class="premium-kicker dark">{{ $content['form_kicker'] ?? '' }}</span>
                <h2>{{ $content['form_heading'] ?? '' }}</h2>
                <p>{{ $content['form_text'] ?? '' }}</p>
            </div>

            <div class="form-grid">
                <div class="field"><label>Name *</label><input name="name" value="{{ old('name') }}" required placeholder="Your full name"></div>
                <div class="field"><label>Email *</label><input type="email" name="email" value="{{ old('email') }}" required placeholder="name@company.com"></div>
                <div class="field"><label>Phone / WhatsApp</label><input name="phone" value="{{ old('phone') }}" placeholder="Country code + number"></div>
                <div class="field"><label>Company / Farm</label><input name="company" value="{{ old('company') }}" placeholder="Business, clinic or farm name"></div>
                <div class="field"><label>Country</label><input name="country" value="{{ old('country') }}" placeholder="Destination country"></div>
                <div class="field">
                    <label>Product</label>
                    <select name="product_id">
                        <option value="">Select product (optional)</option>
                        @foreach($products as $product)<option value="{{ $product->id }}" @selected(old('product_id', request('product')) == $product->id)>{{ $product->name }}</option>@endforeach
                    </select>
                </div>
                @if($type === 'quote')<div class="field"><label>Quantity / Requirement</label><input name="quantity" value="{{ old('quantity') }}" placeholder="e.g. 100 pcs / 10 sets"></div>@endif
                <div class="field"><label>Subject</label><input name="subject" value="{{ old('subject') }}" placeholder="Short summary"></div>
                <div class="field full"><label>Message *</label><textarea name="message" required placeholder="Product model/size, quantity, destination, usage question, packaging, OEM/private label, or other requirements...">{{ old('message') }}</textarea></div>
                <div class="field full request-submit-v11">
                    <button class="btn btn-primary" type="submit">{{ $content['submit_label'] ?? ($type === 'quote' ? 'Send Quote Request' : 'Send Inquiry') }}</button>
                    <span>{{ $content['submit_note'] ?? '' }}</span>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
