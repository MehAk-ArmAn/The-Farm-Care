<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class ContentRefreshSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(['key' => 'home'], [
            'title' => 'Home',
            'heading' => 'Reliable Veterinary Equipment & Animal Nutrition Solutions',
            'subheading' => 'Trusted veterinary equipment and animal nutrition solutions from Sialkot, Pakistan — built for farms, clinics, distributors and global buyers who value quality, reliability and long-term support.',
            'content' => [
                'eyebrow' => 'Trusted Since 2011 • Export Ready Supply',
                'hero_badge' => 'Veterinary + Nutrition',
                'hero_primary_label' => 'Explore Products',
                'hero_secondary_label' => 'Contact Us',
                'intro_kicker' => 'About The Farm Care',
                'intro_heading' => 'Trusted veterinary equipment and animal nutrition solutions.',
                'intro_text' => 'The Farm Care supplies practical veterinary and livestock-care products for farms, veterinary professionals, distributors and international buyers. Our focus is straightforward: reliable products, clear communication and dependable supply support.',
                'intro_point_1_heading' => 'Premium Quality',
                'intro_point_1_text' => 'Products selected for real farm, livestock and veterinary use — not just presentation.',
                'intro_point_2_heading' => 'Global Supply Vision',
                'intro_point_2_text' => 'Built for local trust, distributor relationships and international growth.',
                'categories_heading' => 'Main Product Categories',
                'categories_subheading' => 'Explore our core product lines for veterinary clinics, livestock-care operations, breeding programs, farms and professional buyers.',
                'category_link_label' => 'Explore category',
                'why_section_heading' => 'Built for quality, support and reliable supply.',
                'why_1_heading' => '24/7 Customer Support',
                'why_1_text' => 'Responsive assistance for customers, distributors and business partners.',
                'why_2_heading' => 'Quality Products',
                'why_2_text' => 'Reliable veterinary and animal-care solutions selected for practical performance.',
                'why_3_heading' => 'Buyer Confidence',
                'why_3_text' => 'Clear product information, responsive communication and dependable service quality.',
                'why_4_heading' => 'Fast Shipping Support',
                'why_4_text' => 'Quick dispatch coordination for domestic supply and export-oriented orders.',
                'partner_heading' => 'Buying for a Farm, Clinic or Distribution Business?',
                'partner_text' => 'Tell us the product, quantity and destination. We support bulk-order discussions, distributor supply, OEM/customization requests and export availability inquiries.',
                'partner_button_label' => 'Request Bulk Quote',
            ],
            'seo_title' => 'The Farm Care | Professional Veterinary Equipment',
            'seo_description' => 'Veterinary equipment, livestock-care tools and animal nutrition solutions from The Farm Care for farms, clinics, distributors and global buyers.',
            'is_active' => true,
        ]);

        Page::updateOrCreate(['key' => 'about'], [
            'title' => 'About Us',
            'heading' => 'Trusted veterinary equipment and animal nutrition solutions.',
            'subheading' => 'The Farm Care is based in Sialkot, Pakistan and supports farms, veterinary professionals, distributors and international buyers with practical livestock and veterinary products.',
            'content' => [
                'page_kicker' => 'The Farm Care',
                'section_kicker' => 'Who We Serve',
                'section_heading' => 'Practical equipment. Professional support.',
                'body' => 'Since 2011, The Farm Care has focused on dependable veterinary equipment, livestock-care tools and animal nutrition solutions. Our catalog supports livestock handling, artificial insemination, oral dosing, dairy care, veterinary procedures and routine farm management, with support for direct buyers, distributors, bulk quantities, OEM/private-label discussions and export requirements.',
                'buyer_1_heading' => 'Farms & Breeding Centres',
                'buyer_1_text' => 'Livestock handling, breeding, dosing and herd-care equipment for day-to-day operations.',
                'buyer_2_heading' => 'Veterinary Clinics',
                'buyer_2_text' => 'Professional instruments and practical treatment-support equipment for livestock care.',
                'buyer_3_heading' => 'Distributors & Retailers',
                'buyer_3_text' => 'Catalog supply, bulk quantities, product-range planning and long-term buying discussions.',
                'buyer_4_heading' => 'OEM / Private Label Buyers',
                'buyer_4_text' => 'Customization, branding, packaging and model discussions for suitable products.',
                'supply_kicker' => 'Our Supply Approach',
                'supply_heading' => 'Clear information before you order.',
                'supply_1' => 'Product-specific specifications, materials and available variants.',
                'supply_2' => 'Direct product inquiry and quotation support from the catalog.',
                'supply_3' => 'Bulk, distributor, OEM and export-oriented supply discussions.',
                'supply_4' => 'Clear, current product information to support confident buyer decisions.',
            ],
            'seo_title' => 'About The Farm Care | Veterinary Equipment Supplier',
            'seo_description' => 'Learn about The Farm Care, supplying veterinary equipment and livestock-care products for farms, clinics, distributors and international buyers.',
            'is_active' => true,
        ]);

        Page::updateOrCreate(['key' => 'contact'], [
            'title' => 'Contact Us',
            'heading' => 'Get in touch with The Farm Care',
            'subheading' => 'Contact our team for product details, quotations, bulk quantities, distributor supply, OEM/customization discussions and export availability.',
            'content' => [
                'page_kicker' => 'Buyer & Product Support',
                'choice_kicker' => 'Choose the fastest route',
                'choice_heading' => 'What do you need help with?',
                'choice_text' => 'Use a quote request when you already know the product and quantity. Use a general inquiry for specifications, compatibility, availability, distribution or product-selection questions.',
                'quote_heading' => 'Request a Quote',
                'quote_text' => 'Share product, quantity, destination and any OEM, packaging or bulk-order requirements.',
                'quote_button' => 'Start quote',
                'inquiry_heading' => 'General Inquiry',
                'inquiry_text' => 'Ask about product specifications, compatibility, variants, availability or distribution.',
                'inquiry_button' => 'Send inquiry',
            ],
            'seo_title' => 'Contact The Farm Care | Product & Wholesale Inquiries',
            'seo_description' => 'Contact The Farm Care for veterinary equipment inquiries, quotations, bulk orders, distributor supply and OEM discussions.',
            'is_active' => true,
        ]);

        Page::updateOrCreate(['key' => 'products'], [
            'title' => 'Products',
            'heading' => 'Browse Our Products',
            'subheading' => 'Browse The Farm Care product range for veterinary clinics, farms, breeding centres, distributors and export buyers.',
            'content' => [
                'page_kicker' => 'Professional Veterinary & Livestock Equipment',
                'sidebar_kicker' => 'Browse',
                'sidebar_heading' => 'Product Categories',
                'all_products_label' => 'All Products',
                'toolbar_text' => 'Choose a product to review specifications, available models, practical-use information and direct inquiry options.',
                'search_placeholder' => 'Search products by name or use...',
                'search_button' => 'Search',
                'view_product_label' => 'View Product',
                'empty_heading' => 'No matching products found',
                'empty_text' => 'Try another category or search term, or return to the full product catalog.',
                'empty_button' => 'View All Products',
            ],
            'seo_title' => 'Products | The Farm Care',
            'seo_description' => 'Browse The Farm Care veterinary and livestock product catalog across nine core product categories.',
            'is_active' => true,
        ]);

        Page::updateOrCreate(['key' => 'inquiry'], [
            'title' => 'Inquiry',
            'heading' => 'Send a Product Inquiry',
            'subheading' => 'Ask about specifications, available variants, compatibility, stock availability, distributor supply or another product-related requirement.',
            'content' => [
                'page_kicker' => 'Product Support',
                'guide_kicker' => 'Before you submit',
                'guide_heading' => 'Include the details that matter.',
                'step_1_title' => 'Product / model', 'step_1_text' => 'Choose the catalog product or describe the item you need.',
                'step_2_title' => 'Your application', 'step_2_text' => 'Tell us the animal type, farm use or professional requirement where relevant.',
                'step_3_title' => 'Destination', 'step_3_text' => 'Country information helps with availability and export discussions.',
                'step_4_title' => 'Specific question', 'step_4_text' => 'Include size, material, compatibility, packaging or other information you need.',
                'form_kicker' => 'Inquiry Details',
                'form_heading' => 'How can we help?',
                'form_text' => 'Provide enough detail for our team to understand the product and your requirement clearly.',
                'submit_label' => 'Send Inquiry',
                'submit_note' => 'Your request is sent to The Farm Care for follow-up.',
            ],
            'seo_title' => 'Product Inquiry | The Farm Care',
            'seo_description' => 'Send a product or business inquiry to The Farm Care.',
            'is_active' => true,
        ]);

        Page::updateOrCreate(['key' => 'quote'], [
            'title' => 'Quote',
            'heading' => 'Request a Product Quote',
            'subheading' => 'Tell us the product, quantity and destination. Include model, OEM/private-label, packaging or other supply requirements where applicable.',
            'content' => [
                'page_kicker' => 'Pricing & Supply',
                'guide_kicker' => 'Before you submit',
                'guide_heading' => 'Include the details that help us quote accurately.',
                'step_1_title' => 'Product / model', 'step_1_text' => 'Select the product and preferred model or size if known.',
                'step_2_title' => 'Quantity', 'step_2_text' => 'Approximate quantity helps us understand the supply level required.',
                'step_3_title' => 'Destination', 'step_3_text' => 'Country information is useful for export and shipping discussions.',
                'step_4_title' => 'Customization', 'step_4_text' => 'Mention branding, packaging, OEM or private-label requirements.',
                'form_kicker' => 'Quotation Request',
                'form_heading' => 'Tell us what you need',
                'form_text' => 'Complete the form with product, quantity, destination and any customization details that will help us prepare a relevant response.',
                'submit_label' => 'Send Quote Request',
                'submit_note' => 'The Farm Care team will review your request and follow up with relevant commercial information.',
            ],
            'seo_title' => 'Request a Quote | The Farm Care',
            'seo_description' => 'Request veterinary equipment pricing, bulk quantities, OEM or export information from The Farm Care.',
            'is_active' => true,
        ]);

        $settings = [
            'site_name' => 'The Farm Care',
            'header_descriptor' => 'Veterinary & Livestock Solutions',
            'tagline' => 'Precision-crafted veterinary equipment and nutrition solutions since 2011. Exporting excellence from Sialkot to the world.',
            'footer_about_text' => 'Precision-crafted veterinary equipment and nutrition solutions since 2011. Exporting excellence from Sialkot to the world.',
            'email' => 'info@thefarmcare.com',
            'phone' => '+61-0491-795-102',
            'pakistan_office_label' => 'Pakistan Office',
            'pakistan_office' => 'Sialkot, 51310 Pakistan',
            'australia_office_label' => 'Australia Office',
            'australia_office' => "9 Stevenage Dr, Strathtulloh VIC 3338\nMelbourne, Victoria, Australia",
            'nav_home' => 'Home', 'nav_products' => 'Products', 'nav_about' => 'About', 'nav_contact' => 'Contact', 'nav_inquiry' => 'Inquiry', 'nav_quote' => 'Get a Quote',
            'mobile_menu_label' => 'Open navigation',
            'hero_stat_1_value' => '2011', 'hero_stat_1_label' => 'Trusted Since',
            'hero_stat_2_value' => '300+', 'hero_stat_2_label' => 'Veterinary Stores',
            'hero_stat_3_value' => '250+', 'hero_stat_3_label' => 'Farm Setups',
            'hero_stat_4_value' => 'Fast', 'hero_stat_4_label' => 'Export Support',
            'footer_navigation_heading' => 'Navigation', 'footer_categories_heading' => 'Categories', 'footer_office_heading' => 'Global Office',
            'footer_all_products_label' => 'All Products', 'footer_about_label' => 'About Us', 'footer_contact_label' => 'Contact Us',
            'footer_note' => 'Quality • OEM • Customization • Technical Support',
            'footer_copyright' => '© 2026 THE FARM CARE. ALL RIGHTS RESERVED.',
            'social_whatsapp' => '61491795102',
            'product_request_quote_label' => 'Request Quote', 'product_whatsapp_label' => 'WhatsApp', 'product_ask_question_label' => 'Ask a Question', 'product_view_label' => 'View Product',
            'product_signal_1_title' => 'Professional Supply', 'product_signal_1_text' => 'Farm and veterinary equipment',
            'product_signal_2_title' => 'Buyer Support', 'product_signal_2_text' => 'Bulk, distributor and OEM inquiries',
            'product_signal_3_title' => 'Export Support', 'product_signal_3_text' => 'Product and destination-specific assistance',
            'product_overview_heading' => 'Product Overview', 'product_benefits_heading' => 'Benefits', 'product_applications_heading' => 'Applications',
            'product_data_kicker' => 'Product Data', 'product_specifications_heading' => 'Specifications', 'product_variants_heading' => 'Available Models / Variants',
            'product_practical_kicker' => 'Practical Information', 'product_usage_heading' => 'Usage Guide', 'product_features_heading' => 'Key Features', 'product_package_heading' => 'Package Contents',
            'product_care_heading' => 'Cleaning & Care', 'product_notes_heading' => 'Professional Use Notes',
            'product_inquiry_kicker' => 'Wholesale • OEM • Export', 'product_inquiry_heading' => 'Request for Product Inquiry / Quote',
            'product_inquiry_text' => 'Share the product model, quantity and destination so our team can respond with relevant availability and commercial information.',
            'product_response_badge' => 'Fast Response', 'product_submit_label' => 'Send Inquiry / Request Quote',
            'product_related_heading' => 'Related Products', 'product_related_text' => 'Explore more products from the same category.',
            'product_trust_1_title' => 'Quality Products', 'product_trust_1_text' => 'Reliable veterinary and animal-care products selected for practical use.',
            'product_trust_2_title' => 'Fast Shipping Support', 'product_trust_2_text' => 'Domestic and export-oriented dispatch coordination for buyers.',
            'product_trust_3_title' => 'OEM Support', 'product_trust_3_text' => 'Suitable products can be discussed for branding, packaging and private-label supply.',
            'product_trust_4_title' => 'Technical Support', 'product_trust_4_text' => 'Clear communication and buyer-friendly product information before ordering.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['group' => $this->group($key), 'value' => $value, 'type' => 'text']);
        }
    }

    private function group(string $key): string
    {
        if (str_starts_with($key, 'nav_') || str_starts_with($key, 'header_')) return 'navigation';
        if (str_starts_with($key, 'footer_')) return 'footer';
        if (str_starts_with($key, 'product_')) return 'product_pages';
        if (str_starts_with($key, 'hero_')) return 'homepage';
        if (str_starts_with($key, 'social_')) return 'social';
        if (str_contains($key, 'office') || in_array($key, ['phone','email'])) return 'contact';
        return 'general';
    }
}
