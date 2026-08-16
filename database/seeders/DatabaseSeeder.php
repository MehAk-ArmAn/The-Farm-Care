<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@thefarmcare.com'],
            ['name' => 'The Farm Care Admin', 'password' => Hash::make('FarmCare@2026'), 'is_admin' => true]
        );

        $items = [
            ['Bull Nose Rings', 'bull-nose-rings', 'Brass & stainless steel rings for secure bull handling.', 'bull-nose-ring.jpg'],
            ['Sucking Prevention', 'sucking-prevention', 'Milk preventers for calves and young cattle.', 'sucking-prevention.jpg'],
            ['Drenching Gun', 'drenching-gun', 'Accurate oral dosing for cattle, sheep and goats.', 'drenching-gun.jpg'],
            ['Castration Plier / Forceps', 'castration-plier', 'Professional Burdizzo tools for livestock management.', 'castration-plier.jpg'],
            ['Teat Dilators', 'teat-dilators', 'Precision tools for teat blockage support.', 'teat-dilator.jpg'],
            ['Bolus Gun', 'bolus-gun', 'Easy delivery of medicine bolus to livestock.', 'bolus-gun.jpg'],
            ['TPX Syringe', 'tpx-syringe', 'Heat-resistant, durable syringe for long service use.', 'tpx-syringe.jpg'],
            ['Transparent Plastic Syringe', 'transparent-syringe', 'Unbreakable, washable syringe for daily farm use.', 'transparent-syringe.jpg'],
            ['AI Gun Self-Lock & Universal Auto-Lock', 'ai-gun', 'Compatible with 0.25 ml and 0.5 ml straws.', 'ai-gun.jpg'],
        ];

        foreach ($items as $i => $x) {
            $category = Category::updateOrCreate(
                ['slug' => $x[1]],
                [
                    'name' => $x[0],
                    'description' => $x[2],
                    'image' => 'seed/'.$x[3],
                    'sort_order' => $i + 1,
                    'is_active' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => $x[1]],
                [
                    'category_id' => $category->id,
                    'name' => $x[0],
                    'short_description' => $x[2],
                    'description' => $this->description($x[0]),
                    'features' => $this->features($x[1]),
                    'specifications' => $this->specs(),
                    'image' => 'seed/'.$x[3],
                    'is_featured' => true,
                    'is_active' => true,
                    'sort_order' => $i + 1,
                ]
            );
        }

        $this->call(ProductCatalogSeeder::class);
        $this->call(FullCatalogSeeder::class);
        $this->call(GalleryPreviewSeeder::class);

        Page::updateOrCreate(
            ['key' => 'home'],
            [
                'title' => 'Home',
                'heading' => 'Reliable Veterinary Equipment & Animal Nutrition Solutions',
                'subheading' => 'Trusted veterinary equipment and animal nutrition solutions from Sialkot, Pakistan — built for farms, clinics, distributors, and global buyers.',
                'content' => [
                    'eyebrow' => 'Trusted Since 2011 • Export Ready Supply',
                    'hero_badge' => 'Veterinary + Nutrition',
                    'categories_heading' => 'Explore Our Core Product Categories',
                    'categories_subheading' => 'Nine core product groups for professional livestock handling, treatment, medication and breeding.',
                    'why_1_heading' => '24/7 Customer Support',
                    'why_1_text' => 'Responsive assistance for customers, distributors, and business partners.',
                    'why_2_heading' => 'Quality Products',
                    'why_2_text' => 'Reliable veterinary and animal care solutions built for performance.',
                    'why_3_heading' => 'Buyer Confidence',
                    'why_3_text' => 'Built on trust, transparent support, and dependable service quality.',
                    'why_4_heading' => 'Fast Shipping',
                    'why_4_text' => 'Quick dispatch support for domestic delivery and export orders.',
                    'partner_heading' => 'Partner With Us. Grow Together.',
                    'partner_text' => 'We support OEM manufacturing, custom branding, private labeling, distributor partnerships, and bulk orders.',
                ],
                'seo_title' => 'The Farm Care | Veterinary Equipment',
                'seo_description' => 'Veterinary equipment and livestock care solutions from The Farm Care.',
                'is_active' => true,
            ]
        );

        Page::updateOrCreate(
            ['key' => 'about'],
            [
                'title' => 'About Us',
                'heading' => 'Trusted veterinary equipment and animal nutrition solutions.',
                'subheading' => 'The Farm Care is a trusted name in veterinary equipment and animal nutrition solutions, proudly based in Sialkot, Pakistan.',
                'content' => [
                    'body' => 'Our focus is on quality, reliability, practical products, responsive support and export-ready supply for farms, clinics, distributors and international buyers.',
                ],
                'is_active' => true,
            ]
        );

        Page::updateOrCreate(
            ['key' => 'contact'],
            [
                'title' => 'Contact Us',
                'heading' => 'Get in touch with The Farm Care',
                'subheading' => 'Talk with our team about products, bulk orders, distribution, OEM, customization and export requirements.',
                'content' => [],
                'is_active' => true,
            ]
        );

        $settings = [
            'site_name' => 'The Farm Care',
            'tagline' => 'Precision-crafted veterinary equipment and nutrition solutions since 2011.',
            'email' => 'info@thefarmcare.com',
            'phone' => '+61-0491-795-102',
            'pakistan_office' => 'Sialkot, 51310 Pakistan',
            'australia_office' => '9 Stevenage Dr, Strathtulloh VIC 3338, Melbourne, Victoria, Australia',
            'hero_stat_1_value' => '2011',
            'hero_stat_1_label' => 'Trusted Since',
            'hero_stat_2_value' => '300+',
            'hero_stat_2_label' => 'Veterinary Stores',
            'hero_stat_3_value' => '250+',
            'hero_stat_3_label' => 'Farm Setups',
            'hero_stat_4_value' => 'Fast',
            'hero_stat_4_label' => 'Export Support',
            'social_facebook' => '',
            'social_instagram' => '',
            'social_linkedin' => '',
            'social_whatsapp' => '61491795102',
            'footer_note' => 'Quality • OEM • Customization • Technical Support',
            'logo' => 'seed/logo.png',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['group' => 'general', 'value' => $value, 'type' => 'text']
            );
        }

        $this->call(ContentRefreshSeeder::class);
    }

    private function description(string $name): string
    {
        return $name.' from The Farm Care is designed for practical professional livestock and veterinary use, with emphasis on durability, reliable handling and buyer confidence.';
    }

    private function features(string $slug): array
    {
        return match ($slug) {
            'bull-nose-rings' => ['Brass and stainless steel options', 'Designed for secure bull handling', 'Supplied with screw and L-key'],
            'sucking-prevention' => ['Supports calf weaning', 'Helps reduce unwanted suckling', 'Farm-friendly reusable design'],
            'drenching-gun' => ['Accurate oral dosing', 'Adjustable and fixed-dose options', 'Washable durable construction'],
            'castration-plier' => ['Professional Burdizzo/forceps design', 'Heavy-duty construction', 'For trained livestock professionals'],
            'teat-dilators' => ['Precision stainless design', 'Supports teat canal procedures', 'Professional veterinary use'],
            'bolus-gun' => ['Easy bolus administration', 'Livestock-ready design', 'Durable reusable tool'],
            'tpx-syringe' => ['High-temperature tolerance', 'Acid and alcohol resistant', 'Long service life'],
            'transparent-syringe' => ['Transparent body', 'Washable and reusable', 'Everyday farm use'],
            'ai-gun' => ['0.25 ml and 0.5 ml straw compatibility', 'Self-lock / universal auto-lock options', 'Professional breeding application'],
            default => [],
        };
    }

    private function specs(): array
    {
        return [
            'Application' => 'Livestock / Veterinary',
            'Brand' => 'The Farm Care',
            'Supply' => 'Retail, wholesale, distributor and OEM inquiries',
        ];
    }
}
