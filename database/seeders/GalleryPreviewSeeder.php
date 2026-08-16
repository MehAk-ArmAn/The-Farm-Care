<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class GalleryPreviewSeeder extends Seeder
{
    public function run(): void
    {
        Product::active()->get()->each(function (Product $product): void {
            $gallery = collect(['main.jpg', 'detail.jpg', 'closeup.jpg'])
                ->map(fn ($file) => 'assets/images/product-galleries/'.$product->slug.'/'.$file)
                ->filter(fn ($path) => is_file(public_path($path)))
                ->values()
                ->all();

            if ($gallery) {
                $product->update(['gallery' => $gallery]);
            }
        });
    }
}
