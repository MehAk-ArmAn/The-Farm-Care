<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\ProductOption;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Show all products in admin panel
     */
    public function index()
    {
        // Get latest products and paginate
        $products = Product::latest()->paginate(12);

        // Send products to admin view
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show create product form
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'sku' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'short_title' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'options' => ['nullable', 'array'],
            'options.*' => ['nullable', 'string', 'max:255'],
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug ?: Str::slug($request->name . '-' . ($request->sku ?: uniqid()));
        $product->sku = $request->sku;
        $product->price = $request->price ?? 0;
        $product->short_title = $request->short_title;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->sort_order = $request->sort_order ?? 0;
        $product->is_featured = $request->has('is_featured');
        $product->is_active = $request->has('is_active');

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_featured_' . $file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);
            $product->featured_image = $filename;
        }

        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $filename = time() . '_' . $index . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $filename);

                $product->images()->create([
                    'image_path' => $filename,
                    'alt_text' => $product->name,
                    'sort_order' => $index,
                ]);
            }
        }

        if ($request->filled('options')) {
            foreach ($request->options as $index => $option) {
                if (!empty(trim($option))) {
                    $product->options()->create([
                        'option_name' => trim($option),
                        'sort_order' => $index,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show edit form for a product
     */
    public function edit(Product $product)
    {
        $product->load(['images', 'options']);
        $categories = Category::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update a product
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug,' . $product->id],
            'sku' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'short_title' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'options' => ['nullable', 'array'],
            'options.*' => ['nullable', 'string', 'max:255'],
        ]);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug ?: Str::slug($request->name . '-' . ($request->sku ?: $product->id));
        $product->sku = $request->sku;
        $product->price = $request->price ?? 0;
        $product->short_title = $request->short_title;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->sort_order = $request->sort_order ?? 0;
        $product->is_featured = $request->has('is_featured');
        $product->is_active = $request->has('is_active');

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_featured_' . $file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);
            $product->featured_image = $filename;
        }

        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $filename = time() . '_' . $index . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $filename);

                $product->images()->create([
                    'image_path' => $filename,
                    'alt_text' => $product->name,
                    'sort_order' => $index,
                ]);
            }
        }

        $product->options()->delete();

        if ($request->filled('options')) {
            foreach ($request->options as $index => $option) {
                if (!empty(trim($option))) {
                    $product->options()->create([
                        'option_name' => trim($option),
                        'sort_order' => $index,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.edit', $product->id)->with('success', 'Product updated successfully.');
    }

    /**
     * Delete a product and all related images
     */
    public function destroy($id)
    {
        // Load product with related images
        $product = Product::with('images')->findOrFail($id);

        // Delete featured image file if it exists
        if (!empty($product->featured_image)) {
            $featuredImagePath = public_path('images/products/' . $product->featured_image);

            if (file_exists($featuredImagePath)) {
                unlink($featuredImagePath);
            }
        }

        // Delete all extra gallery image files
        foreach ($product->images as $image) {
            if (!empty($image->image_path)) {
                $galleryImagePath = public_path('images/products/' . $image->image_path);

                if (file_exists($galleryImagePath)) {
                    unlink($galleryImagePath);
                }
            }
        }

        // Delete all related rows from product_images table
        $product->images()->delete();

        // Delete product row itself
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
