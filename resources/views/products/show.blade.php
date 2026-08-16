@extends('layouts.app')

@section('title', $product->seo_title ?: ($product->name . ' | The Farm Care'))
@section('meta_description', $product->seo_description ?: $product->short_description)

@section('content')
@php
    $mainImage = $product->image ? \App\Support\MediaUrl::make($product->image) : asset('assets/images/logo.png');

    $cmsGallery = collect($product->gallery ?? [])->reject(fn ($image) => str_ends_with(strtolower((string) $image), '/usage.jpg'))->filter(fn ($image) => \App\Support\MediaUrl::exists($image))->map(fn ($image) => \App\Support\MediaUrl::make($image))->unique()->values();
    $fallbackGallery = collect(['main.jpg','detail.jpg','closeup.jpg'])
        ->map(fn ($file) => 'assets/images/product-galleries/'.$product->slug.'/'.$file)
        ->filter(fn ($path) => is_file(public_path($path)))
        ->map(fn ($path) => asset($path))
        ->values();
    $thumbGallery = $cmsGallery->isNotEmpty() ? $cmsGallery : $fallbackGallery;

    $highlights = collect($product->features ?? [])->take(4)->values();
    $benefits = collect($product->benefits ?? []);
    $applications = collect($product->applications ?? []);
    $packageContents = collect($product->package_contents ?? []);
    $specifications = collect($product->specifications ?? []);
    $variants = collect($product->variants ?? [])->filter(fn ($variant) => !empty($variant['name']));
    $whatsAppSource = $siteSettings['social_whatsapp'] ?? ($siteSettings['phone'] ?? '');
    $whatsAppNumber = preg_replace('/\D+/', '', $whatsAppSource);
    if (str_starts_with($whatsAppNumber, '610')) $whatsAppNumber = '61'.substr($whatsAppNumber, 3);
    if (str_starts_with($whatsAppNumber, '920')) $whatsAppNumber = '92'.substr($whatsAppNumber, 3);
    $whatsAppText = rawurlencode('Hello The Farm Care, I am interested in '.$product->name.'. Please share product details, availability and pricing.');
@endphp

<section class="page-hero page-hero-compact page-hero-product-v12">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">{{ $siteSettings['nav_home'] ?? 'Home' }}</a><span>/</span>
            <a href="{{ route('products.index') }}">{{ $siteSettings['nav_products'] ?? 'Products' }}</a><span>/</span>
            <span>{{ $product->name }}</span>
        </div>
    </div>
</section>

<section class="section product-detail-section product-detail-section-v12 product-detail-section-v13 product-detail-section-v14">
    <div class="container product-detail-v12 product-detail-v13 product-detail-v14">
        <div class="product-visual-column product-visual-column-v12">
            <div class="gallery-showcase-v12 {{ $thumbGallery->isEmpty() ? 'gallery-showcase-v12-no-thumbs' : '' }}">
                @if($thumbGallery->isNotEmpty())
                    <div class="product-thumb-rail-v12" aria-label="Additional product images">
                        @foreach($thumbGallery as $index => $image)
                            <button class="thumb-button-v12" type="button" data-full-image="{{ $image }}" aria-label="View {{ $product->name }} image {{ $index + 1 }}">
                                <img src="{{ $image }}" alt="{{ $product->name }} preview {{ $index + 1 }}" width="180" height="180" loading="lazy">
                            </button>
                        @endforeach
                    </div>
                @endif

                <div class="product-visual-stack-v12">
                    <div class="detail-image detail-image-stage-v12">
                        <img id="product-main-image" src="{{ $mainImage }}" alt="{{ $product->name }}" width="1200" height="1200" loading="eager" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo.png') }}';">
                    </div>
                    <div class="product-action-bar-v12">
                        <a class="btn btn-primary" href="#product-inquiry">{{ $siteSettings['product_request_quote_label'] ?? 'Request Quote' }}</a>
                        @if($whatsAppNumber)<a class="btn btn-outline" href="https://wa.me/{{ $whatsAppNumber }}?text={{ $whatsAppText }}" target="_blank" rel="noopener">{{ $siteSettings['product_whatsapp_label'] ?? 'WhatsApp' }}</a>@endif
                        <a class="btn btn-outline" href="#product-inquiry">{{ $siteSettings['product_ask_question_label'] ?? 'Ask a Question' }}</a>
                    </div>
                </div>
            </div>
        </div>

        <article class="detail detail-v12">
            <span class="badge">{{ $product->category->name }}</span>
            <h1>{{ $product->name }}</h1>
            <p class="detail-lead detail-lead-v12">{{ $product->short_description }}</p>

            <div class="product-commercial-strip-v12 product-commercial-strip-v14">
                <div><strong>{{ $siteSettings['product_signal_1_title'] ?? 'Professional Supply' }}</strong><span>{{ $siteSettings['product_signal_1_text'] ?? 'Farm and veterinary equipment' }}</span></div>
                <div><strong>{{ $siteSettings['product_signal_2_title'] ?? 'Buyer Support' }}</strong><span>{{ $siteSettings['product_signal_2_text'] ?? 'Bulk, distributor and OEM inquiries' }}</span></div>
                <div><strong>{{ $siteSettings['product_signal_3_title'] ?? 'Export Support' }}</strong><span>{{ $siteSettings['product_signal_3_text'] ?? 'Product and destination-specific assistance' }}</span></div>
            </div>

            @if(!empty($product->description))<p class="product-description-premium product-description-v12">{{ $product->description }}</p>@endif

            @if($highlights->isNotEmpty())
                <div class="product-highlight-grid-v12 product-highlight-grid-v14">
                    @foreach($highlights as $feature)<div class="product-highlight-v12"><span>✓</span><strong>{{ $feature }}</strong></div>@endforeach
                </div>
            @endif
        </article>
    </div>

    <div class="container product-content-v12">
        <div class="detail-card-grid-v12 {{ $variants->isNotEmpty() ? 'has-variants' : 'no-variants' }}">
            <section class="info-card info-card-v12 product-overview-v12">
                <span class="premium-kicker dark">{{ $product->category->name }}</span>
                <h2>{{ $siteSettings['product_overview_heading'] ?? 'Product Overview' }}</h2>
                <p>{{ $product->description }}</p>
                @if($benefits->isNotEmpty())
                    <div class="sub-section-v12"><h3>{{ $siteSettings['product_benefits_heading'] ?? 'Benefits' }}</h3><ul class="premium-list">@foreach($benefits as $item)<li>{{ $item }}</li>@endforeach</ul></div>
                @endif
                @if($applications->isNotEmpty())
                    <div class="sub-section-v12"><h3>{{ $siteSettings['product_applications_heading'] ?? 'Applications' }}</h3><ul class="premium-list">@foreach($applications as $item)<li>{{ $item }}</li>@endforeach</ul></div>
                @endif
            </section>

            @if($specifications->isNotEmpty())
                <section class="info-card info-card-v12 product-specifications-v12">
                    <span class="premium-kicker dark">{{ $siteSettings['product_data_kicker'] ?? 'Product Data' }}</span>
                    <h2>{{ $siteSettings['product_specifications_heading'] ?? 'Specifications' }}</h2>
                    <div class="spec-table-wrap"><table class="spec-table"><tbody>@foreach($specifications as $key => $value)<tr><td>{{ $key }}</td><td>{{ $value }}</td></tr>@endforeach</tbody></table></div>
                </section>
            @endif

            @if($variants->isNotEmpty())
                <section class="info-card info-card-v12 product-variants-v12">
                    <span class="premium-kicker dark">Options</span>
                    <h2>{{ $siteSettings['product_variants_heading'] ?? 'Available Models / Variants' }}</h2>
                    <div class="variant-list-v5">
                        @foreach($variants as $variant)
                            <div class="variant-row-v5"><div><strong>{{ $variant['name'] ?? '' }}</strong>@if(!empty($variant['notes']))<span>{{ $variant['notes'] }}</span>@endif</div><div class="variant-meta-v5">@if(!empty($variant['sku']))<span>{{ $variant['sku'] }}</span>@endif @if(!empty($variant['material']))<span>{{ $variant['material'] }}</span>@endif</div></div>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>

        <section class="trust-band-v12">
            @for($i=1;$i<=4;$i++)
                <div class="trust-item-v12"><strong>{{ $siteSettings['product_trust_'.$i.'_title'] ?? '' }}</strong><span>{{ $siteSettings['product_trust_'.$i.'_text'] ?? '' }}</span></div>
            @endfor
        </section>

        <section id="product-usage" class="product-bottom-grid-v12">
            <div class="detail-usage-card-v12">
                <span class="premium-kicker dark">{{ $siteSettings['product_practical_kicker'] ?? 'Practical Information' }}</span>
                <h2>{{ $siteSettings['product_usage_heading'] ?? 'Usage Guide' }}</h2>
                <div class="detail-usage-grid-v12">
                    @if($highlights->isNotEmpty())<div class="usage-block-v12"><h3>{{ $siteSettings['product_features_heading'] ?? 'Key Features' }}</h3><ul class="premium-list">@foreach($product->features as $item)<li>{{ $item }}</li>@endforeach</ul></div>@endif
                    @if($packageContents->isNotEmpty())<div class="usage-block-v12"><h3>{{ $siteSettings['product_package_heading'] ?? 'Package Contents' }}</h3><ul class="premium-list">@foreach($packageContents as $item)<li>{{ $item }}</li>@endforeach</ul></div>@endif
                    @if(!empty($product->care_instructions))<div class="usage-block-v12"><h3>{{ $siteSettings['product_care_heading'] ?? 'Cleaning & Care' }}</h3><p>{{ $product->care_instructions }}</p></div>@endif
                    @if(!empty($product->usage_notes))<div class="usage-block-v12 usage-note-v12"><h3>{{ $siteSettings['product_notes_heading'] ?? 'Professional Use Notes' }}</h3><p>{{ $product->usage_notes }}</p></div>@endif
                </div>
            </div>

            <div id="product-inquiry" class="product-inquiry-v12">
                <div class="product-inquiry-heading-v12">
                    <div><span class="premium-kicker dark">{{ $siteSettings['product_inquiry_kicker'] ?? 'Wholesale • OEM • Export' }}</span><h2>{{ $siteSettings['product_inquiry_heading'] ?? 'Request for Product Inquiry / Quote' }}</h2><p>{{ $siteSettings['product_inquiry_text'] ?? '' }}</p></div>
                    <span class="response-badge-v12">{{ $siteSettings['product_response_badge'] ?? 'Fast Response' }}</span>
                </div>

                @if(session('success'))<div class="inline-success">✓ {{ session('success') }}</div>@endif
                @if($errors->any())<div class="inline-error"><strong>Please check the form:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

                <form method="post" action="{{ route('requests.store') }}" class="product-inquiry-form-v12">
                    @csrf
                    <input type="hidden" name="type" value="inquiry"><input type="hidden" name="product_id" value="{{ $product->id }}"><input type="hidden" name="subject" value="Product Inquiry / Quote: {{ $product->name }}">
                    <div class="field-grid-v12">
                        <div class="form-field"><label>Your Name *</label><input name="name" value="{{ old('name') }}" required placeholder="Enter your full name"></div>
                        <div class="form-field"><label>Email Address *</label><input type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email"></div>
                        <div class="form-field"><label>Phone / WhatsApp</label><input name="phone" value="{{ old('phone') }}" placeholder="Country code + number"></div>
                        <div class="form-field"><label>Business Type</label><input name="company" value="{{ old('company') }}" placeholder="Farm, clinic, distributor, trader..."></div>
                        @if($variants->isNotEmpty())<div class="form-field"><label>Product Variant / Model</label><select name="variant"><option value="">Select model / variant</option>@foreach($variants as $variant)<option value="{{ $variant['name'] }}" @selected(old('variant') === ($variant['name'] ?? ''))>{{ $variant['name'] }}{{ !empty($variant['sku']) ? ' — '.$variant['sku'] : '' }}</option>@endforeach</select></div>@endif
                        <div class="form-field"><label>Country</label><input name="country" value="{{ old('country') }}" placeholder="Destination country"></div>
                        <div class="form-field"><label>Quantity Required</label><input name="quantity" value="{{ old('quantity') }}" placeholder="e.g. 100 pcs"></div>
                        <div class="form-field full"><label>Your Message / Requirements *</label><textarea name="message" required placeholder="Size/model, quantity, destination, OEM/private-label or technical requirements...">{{ old('message') }}</textarea></div>
                    </div>
                    <div class="inquiry-submit-v12"><button class="btn btn-primary" type="submit">{{ $siteSettings['product_submit_label'] ?? 'Send Inquiry / Request Quote' }}</button>@if($whatsAppNumber)<a class="btn btn-outline" href="https://wa.me/{{ $whatsAppNumber }}?text={{ $whatsAppText }}" target="_blank" rel="noopener">{{ $siteSettings['product_whatsapp_label'] ?? 'WhatsApp' }}</a>@endif</div>
                </form>
            </div>
        </section>
    </div>

    @if(isset($related) && $related->isNotEmpty())
        <div class="container section-sm related-products-block related-products-v12">
            <div class="section-head section-head-left"><h2>{{ $siteSettings['product_related_heading'] ?? 'Related Products' }}</h2><p>{{ $siteSettings['product_related_text'] ?? 'Explore more products from this category.' }}</p></div>
            <div class="product-grid related-product-grid">
                @foreach($related as $relatedProduct)
                    <article class="product-card product-card-v10"><a class="product-img product-img-v10" href="{{ route('products.show', $relatedProduct->slug) }}"><img src="{{ $relatedProduct->image ? \App\Support\MediaUrl::make($relatedProduct->image) : asset('assets/images/logo.png') }}" alt="{{ $relatedProduct->name }}" width="1200" height="1200" loading="lazy"></a><div class="product-body product-body-v10"><span class="badge">{{ $relatedProduct->category->name }}</span><h3><a href="{{ route('products.show', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a></h3><p>{{ $relatedProduct->short_description }}</p><div class="product-actions product-actions-v10"><a class="btn btn-primary btn-sm" href="{{ route('products.show', $relatedProduct->slug) }}">{{ $siteSettings['product_view_label'] ?? 'View Product' }} <span aria-hidden="true">→</span></a></div></div></article>
                @endforeach
            </div>
        </div>
    @endif
</section>


@endsection
