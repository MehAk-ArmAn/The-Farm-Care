<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = require database_path('seeders/data/product_catalog.php');

        foreach ($catalog as $slug => $data) {
            $product = Product::where('slug', $slug)->first();
            if ($product) {
                $product->update($data);
            }
        }
    }
}
