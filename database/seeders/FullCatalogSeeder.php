<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class FullCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = require database_path('seeders/data/full_catalog.php');

        $categoryIds = [];
        foreach ($catalog['categories'] as $category) {
            $record = Category::updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'image' => $category['image'],
                    'sort_order' => $category['sort_order'],
                    'is_active' => true,
                    'seo_title' => $category['name'].' | The Farm Care',
                    'seo_description' => $category['description'],
                ]
            );
            $categoryIds[$category['slug']] = $record->id;
        }

        // Previous builds represented TPX, transparent syringe and AI gun as separate categories.
        // Keep those records for history/database safety but hide them from the public catalog.
        Category::whereIn('slug', ['tpx-syringe', 'transparent-syringe', 'ai-gun'])
            ->update(['is_active' => false]);

        // Previous builds also seeded category-level placeholder products. Hide only those known placeholders.
        Product::whereIn('slug', [
            'bull-nose-rings', 'sucking-prevention', 'drenching-gun', 'castration-plier',
            'teat-dilators', 'bolus-gun', 'transparent-syringe', 'ai-gun'
        ])->update(['is_active' => false]);

        foreach ($catalog['products'] as $index => $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                [
                    'category_id' => $categoryIds[$product['category_slug']],
                    'name' => $product['name'],
                    'sku' => $product['sku'] ?? null,
                    'short_description' => $product['short_description'],
                    'description' => $product['description'],
                    'features' => $product['features'],
                    'benefits' => $product['benefits'],
                    'applications' => $product['applications'],
                    'package_contents' => $product['package_contents'],
                    'specifications' => $product['specifications'],
                    'care_instructions' => $product['care_instructions'],
                    'usage_notes' => $product['usage_notes'],
                    'image' => $product['image'],
                    'gallery' => $this->galleryFor($product['slug'], $product['gallery'] ?? []),
                    'variants' => $product['variants'] ?? [],
                    'is_featured' => $product['is_featured'] ?? false,
                    'is_active' => true,
                    'sort_order' => $product['sort_order'] ?? ($index + 1),
                    'seo_title' => $product['name'].' | The Farm Care',
                    'seo_description' => $product['short_description'],
                ]
            );
        }
    }

    private function galleryFor(string $slug, array $fallback = []): array
    {
        $paths = collect(['main.jpg', 'detail.jpg', 'closeup.jpg'])
            ->map(fn ($file) => 'assets/images/product-galleries/'.$slug.'/'.$file)
            ->filter(fn ($path) => is_file(public_path($path)))
            ->values()
            ->all();

        return $paths ?: $fallback;
    }
}
