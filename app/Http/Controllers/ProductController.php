<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->orderBy('name')->get();

        $products = Product::with('category')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->paginate(12);

        return view('products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::with(['category', 'images'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('products.show', compact('product'));
    }
}
