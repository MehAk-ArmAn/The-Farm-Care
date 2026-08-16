<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::active()->with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($category) => $category->where('slug', $request->category));
        }

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(fn ($product) => $product
                ->where('name', 'like', "%{$search}%")
                ->orWhere('short_description', 'like', "%{$search}%"));
        }

        return view('products.index', [
            'products' => $query->orderBy('sort_order')->paginate(12)->withQueryString(),
            'categories' => Category::active()
                ->withCount(['products' => fn ($product) => $product->active()])
                ->orderBy('sort_order')
                ->get(),
            'page' => Page::byKey('products'),
        ]);
    }

    public function show(Product $product)
    {
        abort_unless($product->is_active, 404);

        $related = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'related'));
    }
}
