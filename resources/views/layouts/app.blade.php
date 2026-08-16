<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', $siteSettings['tagline'] ?? 'The Farm Care')">
    <title>@yield('title', $siteSettings['site_name'] ?? 'The Farm Care')</title>
    @php($brandIcon = !empty($siteSettings['logo']) ? \App\Support\MediaUrl::make($siteSettings['logo']) : asset('assets/images/logo.png'))
    <link rel="icon" href="{{ $brandIcon }}">
    <link rel="shortcut icon" href="{{ $brandIcon }}">
    <link rel="apple-touch-icon" href="{{ $brandIcon }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
<header class="header">
    <div class="container nav">
        <a class="brand" href="{{ route('home') }}">
            <img src="{{ $brandIcon }}" alt="{{ $siteSettings['site_name'] ?? 'The Farm Care' }} logo" width="82" height="82">
            <span class="brand-copy">
                <strong>{{ $siteSettings['site_name'] ?? 'The Farm Care' }}</strong>
                <small>{{ $siteSettings['header_descriptor'] ?? 'Veterinary & Livestock Solutions' }}</small>
            </span>
        </a>

        <button class="mobile-toggle" aria-label="{{ $siteSettings['mobile_menu_label'] ?? 'Open navigation' }}">☰</button>

        <nav class="nav-links" aria-label="Primary navigation">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ $siteSettings['nav_home'] ?? 'Home' }}</a>
            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">{{ $siteSettings['nav_products'] ?? 'Products' }}</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ $siteSettings['nav_about'] ?? 'About' }}</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ $siteSettings['nav_contact'] ?? 'Contact' }}</a>
            <a href="{{ route('inquiry') }}" class="{{ request()->routeIs('inquiry') ? 'active' : '' }}">{{ $siteSettings['nav_inquiry'] ?? 'Inquiry' }}</a>
        </nav>

        <a class="btn btn-primary" href="{{ route('quote') }}">{{ $siteSettings['nav_quote'] ?? 'Get a Quote' }}</a>
    </div>
</header>

@if(session('success'))
    <div class="container">
        <div class="flash flash-success">{{ session('success') }}</div>
    </div>
@endif

@yield('content')

<footer class="footer footer-v13">
    <div class="container">
        <div class="footer-grid footer-grid-v13">
            <div class="footer-brand">
                <img src="{{ $brandIcon }}" alt="{{ $siteSettings['site_name'] ?? 'The Farm Care' }} logo" width="88" height="88">
                <div>
                    <h4>{{ $siteSettings['site_name'] ?? 'The Farm Care' }}</h4>
                    <p>{{ $siteSettings['footer_about_text'] ?? ($siteSettings['tagline'] ?? '') }}</p>
                </div>
            </div>

            <div>
                <h4>{{ $siteSettings['footer_navigation_heading'] ?? 'Navigation' }}</h4>
                <ul>
                    <li><a href="{{ route('home') }}">{{ $siteSettings['nav_home'] ?? 'Home' }}</a></li>
                    <li><a href="{{ route('products.index') }}">{{ $siteSettings['footer_all_products_label'] ?? 'All Products' }}</a></li>
                    <li><a href="{{ route('about') }}">{{ $siteSettings['footer_about_label'] ?? 'About Us' }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ $siteSettings['footer_contact_label'] ?? 'Contact Us' }}</a></li>
                    <li><a href="{{ route('inquiry') }}">{{ $siteSettings['nav_inquiry'] ?? 'Inquiry' }}</a></li>
                </ul>
            </div>

            <div>
                <h4>{{ $siteSettings['footer_categories_heading'] ?? 'Categories' }}</h4>
                <ul>
                    @foreach(($footerCategories ?? collect()) as $category)
                        <li><a href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4>{{ $siteSettings['footer_office_heading'] ?? 'Global Office' }}</h4>
                <ul class="footer-contact-list-v13">
                    <li><strong>{{ $siteSettings['pakistan_office_label'] ?? 'Pakistan Office' }}:</strong> {!! nl2br(e($siteSettings['pakistan_office'] ?? 'Sialkot, 51310 Pakistan')) !!}</li>
                    <li><strong>{{ $siteSettings['australia_office_label'] ?? 'Australia Office' }}:</strong> {!! nl2br(e($siteSettings['australia_office'] ?? "9 Stevenage Dr, Strathtulloh VIC 3338\nMelbourne, Victoria, Australia")) !!}</li>
                    <li><a href="tel:{{ preg_replace('/[^+0-9]/', '', $siteSettings['phone'] ?? '') }}">{{ $siteSettings['phone'] ?? '+61-0491-795-102' }}</a></li>
                    <li><a href="mailto:{{ $siteSettings['email'] ?? 'info@thefarmcare.com' }}">{{ $siteSettings['email'] ?? 'info@thefarmcare.com' }}</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>{{ $siteSettings['footer_copyright'] ?? ('© '.date('Y').' THE FARM CARE. ALL RIGHTS RESERVED.') }}</span>
            <span>{{ $siteSettings['footer_note'] ?? '' }}</span>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
