<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->where('is_active', true)
            // ->orderBy('sort_order')
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::with(['category', 'images', 'options'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('products.show', compact('product'));
    }
}
