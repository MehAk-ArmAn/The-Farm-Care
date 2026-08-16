@extends('admin.layout')
@section('heading','Website Settings')
@section('back_url', route('admin.dashboard'))
@section('back_label','Dashboard')
@section('content')
<form class="panel" method="post" enctype="multipart/form-data" action="{{ route('admin.settings.update') }}">
    @csrf @method('PUT')

    <div class="panel-head"><h2>Brand & Header</h2></div>
    <div class="grid2">
        <div class="field"><label>Site Name</label><input name="site_name" value="{{ $settings['site_name'] ?? '' }}"></div>
        <div class="field"><label>Header Descriptor</label><input name="header_descriptor" value="{{ $settings['header_descriptor'] ?? '' }}"></div>
        <div class="field full"><label>Company Tagline / Footer Summary</label><textarea name="tagline">{{ $settings['tagline'] ?? '' }}</textarea></div>
        <div class="field">
            <label>Website Logo</label>
            <input type="file" name="logo" accept="image/*">
            <span class="hint">This logo is also used automatically as the website favicon/browser icon.</span>
            @if(!empty($settings['logo']))<img class="thumb" src="{{ \App\Support\MediaUrl::make($settings['logo']) }}" alt="Current logo">@endif
        </div>
        <div class="field"><label>Mobile Menu Accessible Label</label><input name="mobile_menu_label" value="{{ $settings['mobile_menu_label'] ?? 'Open navigation' }}"></div>
    </div>

    <div class="panel-head admin-section-head"><h2>Navigation Labels</h2></div>
    <div class="grid2">
        <div class="field"><label>Home Label</label><input name="nav_home" value="{{ $settings['nav_home'] ?? 'Home' }}"></div>
        <div class="field"><label>Products Label</label><input name="nav_products" value="{{ $settings['nav_products'] ?? 'Products' }}"></div>
        <div class="field"><label>About Label</label><input name="nav_about" value="{{ $settings['nav_about'] ?? 'About' }}"></div>
        <div class="field"><label>Contact Label</label><input name="nav_contact" value="{{ $settings['nav_contact'] ?? 'Contact' }}"></div>
        <div class="field"><label>Inquiry Label</label><input name="nav_inquiry" value="{{ $settings['nav_inquiry'] ?? 'Inquiry' }}"></div>
        <div class="field"><label>Quote Button Label</label><input name="nav_quote" value="{{ $settings['nav_quote'] ?? 'Get a Quote' }}"></div>
    </div>

    <div class="panel-head admin-section-head"><h2>Contact & Global Offices</h2></div>
    <div class="grid2">
        <div class="field"><label>Email</label><input name="email" value="{{ $settings['email'] ?? '' }}"></div>
        <div class="field"><label>Phone</label><input name="phone" value="{{ $settings['phone'] ?? '' }}"></div>
        <div class="field"><label>Pakistan Office Label</label><input name="pakistan_office_label" value="{{ $settings['pakistan_office_label'] ?? 'Pakistan Office' }}"></div>
        <div class="field"><label>Australia Office Label</label><input name="australia_office_label" value="{{ $settings['australia_office_label'] ?? 'Australia Office' }}"></div>
        <div class="field full"><label>Pakistan Office Address</label><textarea name="pakistan_office">{{ $settings['pakistan_office'] ?? '' }}</textarea></div>
        <div class="field full"><label>Australia Office Address</label><textarea name="australia_office">{{ $settings['australia_office'] ?? '' }}</textarea></div>
    </div>

    <div class="panel-head admin-section-head"><h2>Homepage Statistics</h2></div>
    <div class="grid2">
        @for($i=1;$i<=4;$i++)
            <div class="field"><label>Stat {{ $i }} Value</label><input name="hero_stat_{{ $i }}_value" value="{{ $settings['hero_stat_'.$i.'_value'] ?? '' }}"></div>
            <div class="field"><label>Stat {{ $i }} Label</label><input name="hero_stat_{{ $i }}_label" value="{{ $settings['hero_stat_'.$i.'_label'] ?? '' }}"></div>
        @endfor
    </div>

    <div class="panel-head admin-section-head"><h2>Footer Content</h2></div>
    <div class="grid2">
        <div class="field"><label>Navigation Heading</label><input name="footer_navigation_heading" value="{{ $settings['footer_navigation_heading'] ?? 'Navigation' }}"></div>
        <div class="field"><label>Categories Heading</label><input name="footer_categories_heading" value="{{ $settings['footer_categories_heading'] ?? 'Categories' }}"></div>
        <div class="field"><label>Office Heading</label><input name="footer_office_heading" value="{{ $settings['footer_office_heading'] ?? 'Global Office' }}"></div>
        <div class="field"><label>All Products Label</label><input name="footer_all_products_label" value="{{ $settings['footer_all_products_label'] ?? 'All Products' }}"></div>
        <div class="field"><label>About Us Label</label><input name="footer_about_label" value="{{ $settings['footer_about_label'] ?? 'About Us' }}"></div>
        <div class="field"><label>Contact Us Label</label><input name="footer_contact_label" value="{{ $settings['footer_contact_label'] ?? 'Contact Us' }}"></div>
        <div class="field full"><label>Footer Company Description</label><textarea name="footer_about_text">{{ $settings['footer_about_text'] ?? '' }}</textarea></div>
        <div class="field full"><label>Footer Note</label><input name="footer_note" value="{{ $settings['footer_note'] ?? '' }}"></div>
        <div class="field full"><label>Copyright Text</label><input name="footer_copyright" value="{{ $settings['footer_copyright'] ?? '' }}"></div>
    </div>

    <div class="panel-head admin-section-head"><h2>Shared Product Page Content</h2></div>
    <div class="grid2">
        <div class="field"><label>Request Quote Button</label><input name="product_request_quote_label" value="{{ $settings['product_request_quote_label'] ?? 'Request Quote' }}"></div>
        <div class="field"><label>WhatsApp Button</label><input name="product_whatsapp_label" value="{{ $settings['product_whatsapp_label'] ?? 'WhatsApp' }}"></div>
        <div class="field"><label>Ask Question Button</label><input name="product_ask_question_label" value="{{ $settings['product_ask_question_label'] ?? 'Ask a Question' }}"></div>
        <div class="field"><label>View Product Button</label><input name="product_view_label" value="{{ $settings['product_view_label'] ?? 'View Product' }}"></div>
        <div class="field"><label>Overview Heading</label><input name="product_overview_heading" value="{{ $settings['product_overview_heading'] ?? 'Product Overview' }}"></div>
        <div class="field"><label>Benefits Heading</label><input name="product_benefits_heading" value="{{ $settings['product_benefits_heading'] ?? 'Benefits' }}"></div>
        <div class="field"><label>Applications Heading</label><input name="product_applications_heading" value="{{ $settings['product_applications_heading'] ?? 'Applications' }}"></div>
        <div class="field"><label>Specifications Kicker</label><input name="product_data_kicker" value="{{ $settings['product_data_kicker'] ?? 'Product Data' }}"></div>
        <div class="field"><label>Specifications Heading</label><input name="product_specifications_heading" value="{{ $settings['product_specifications_heading'] ?? 'Specifications' }}"></div>
        <div class="field"><label>Variants Heading</label><input name="product_variants_heading" value="{{ $settings['product_variants_heading'] ?? 'Available Models / Variants' }}"></div>
        <div class="field"><label>Usage Guide Kicker</label><input name="product_practical_kicker" value="{{ $settings['product_practical_kicker'] ?? 'Practical Information' }}"></div>
        <div class="field"><label>Usage Guide Heading</label><input name="product_usage_heading" value="{{ $settings['product_usage_heading'] ?? 'Usage Guide' }}"></div>
        <div class="field"><label>Key Features Heading</label><input name="product_features_heading" value="{{ $settings['product_features_heading'] ?? 'Key Features' }}"></div>
        <div class="field"><label>Package Contents Heading</label><input name="product_package_heading" value="{{ $settings['product_package_heading'] ?? 'Package Contents' }}"></div>
        <div class="field"><label>Cleaning & Care Heading</label><input name="product_care_heading" value="{{ $settings['product_care_heading'] ?? 'Cleaning & Care' }}"></div>
        <div class="field"><label>Professional Notes Heading</label><input name="product_notes_heading" value="{{ $settings['product_notes_heading'] ?? 'Professional Use Notes' }}"></div>
        <div class="field"><label>Related Products Heading</label><input name="product_related_heading" value="{{ $settings['product_related_heading'] ?? 'Related Products' }}"></div>
        <div class="field"><label>Related Products Text</label><input name="product_related_text" value="{{ $settings['product_related_text'] ?? 'Explore more products from this category.' }}"></div>
        <div class="field"><label>Inquiry Kicker</label><input name="product_inquiry_kicker" value="{{ $settings['product_inquiry_kicker'] ?? 'Wholesale • OEM • Export' }}"></div>
        <div class="field"><label>Inquiry Response Badge</label><input name="product_response_badge" value="{{ $settings['product_response_badge'] ?? 'Fast Response' }}"></div>
        <div class="field full"><label>Inquiry Heading</label><input name="product_inquiry_heading" value="{{ $settings['product_inquiry_heading'] ?? 'Request for Product Inquiry / Quote' }}"></div>
        <div class="field full"><label>Inquiry Intro Text</label><textarea name="product_inquiry_text">{{ $settings['product_inquiry_text'] ?? '' }}</textarea></div>
        <div class="field"><label>Inquiry Submit Button</label><input name="product_submit_label" value="{{ $settings['product_submit_label'] ?? 'Send Inquiry / Request Quote' }}"></div>
        <div class="field"><label>Professional Supply Title</label><input name="product_signal_1_title" value="{{ $settings['product_signal_1_title'] ?? 'Professional Supply' }}"></div>
        <div class="field"><label>Professional Supply Text</label><input name="product_signal_1_text" value="{{ $settings['product_signal_1_text'] ?? 'Farm and veterinary equipment' }}"></div>
        <div class="field"><label>Buyer Support Title</label><input name="product_signal_2_title" value="{{ $settings['product_signal_2_title'] ?? 'Buyer Support' }}"></div>
        <div class="field"><label>Buyer Support Text</label><input name="product_signal_2_text" value="{{ $settings['product_signal_2_text'] ?? 'Bulk, distributor and OEM inquiries' }}"></div>
        <div class="field"><label>Export Support Title</label><input name="product_signal_3_title" value="{{ $settings['product_signal_3_title'] ?? 'Export Support' }}"></div>
        <div class="field"><label>Export Support Text</label><input name="product_signal_3_text" value="{{ $settings['product_signal_3_text'] ?? 'Product and destination-specific assistance' }}"></div>
        @for($i=1;$i<=4;$i++)
            <div class="field"><label>Trust Point {{ $i }} Title</label><input name="product_trust_{{ $i }}_title" value="{{ $settings['product_trust_'.$i.'_title'] ?? '' }}"></div>
            <div class="field"><label>Trust Point {{ $i }} Text</label><textarea name="product_trust_{{ $i }}_text" style="min-height:80px">{{ $settings['product_trust_'.$i.'_text'] ?? '' }}</textarea></div>
        @endfor
    </div>

    <div class="panel-head admin-section-head"><h2>Social Links</h2></div>
    <div class="grid2">
        <div class="field"><label>Facebook URL</label><input name="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}"></div>
        <div class="field"><label>Instagram URL</label><input name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}"></div>
        <div class="field"><label>LinkedIn URL</label><input name="social_linkedin" value="{{ $settings['social_linkedin'] ?? '' }}"></div>
        <div class="field"><label>WhatsApp Number</label><input name="social_whatsapp" value="{{ $settings['social_whatsapp'] ?? '' }}"></div>
    </div>

    <div class="field full" style="margin-top:20px"><button class="btn btn-primary">Save Website Settings</button></div>
</form>
@endsection
