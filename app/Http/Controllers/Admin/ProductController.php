<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('q')) {
            $query->where('name', 'like', '%'.$request->q.'%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        return view('admin.products.index', [
            'products' => $query->orderBy('sort_order')->paginate(30)->withQueryString(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.products.form', [
            'product' => new Product,
            'categories' => Category::orderBy('sort_order')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->data($request);
        unset($data['remove_gallery']);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['features'] = $this->lines($request->features_text);
        $data['benefits'] = $this->lines($request->benefits_text);
        $data['applications'] = $this->lines($request->applications_text);
        $data['package_contents'] = $this->lines($request->package_contents_text);
        $data['specifications'] = $this->specs($request->specifications_text);
        $data['variants'] = $this->variants($request->variants_text);
        $data['image'] = $this->upload($request, 'image', 'products');
        $data['gallery'] = $this->gallery($request);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.form', [
            'product' => $product,
            'categories' => Category::orderBy('sort_order')->get(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->data($request, $product->id);
        unset($data['remove_gallery']);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['features'] = $this->lines($request->features_text);
        $data['benefits'] = $this->lines($request->benefits_text);
        $data['applications'] = $this->lines($request->applications_text);
        $data['package_contents'] = $this->lines($request->package_contents_text);
        $data['specifications'] = $this->specs($request->specifications_text);
        $data['variants'] = $this->variants($request->variants_text);

        if ($path = $this->upload($request, 'image', 'products')) {
            $data['image'] = $path;
        }

        $existingGallery = $product->gallery ?? [];
        $removeGallery = array_values(array_intersect(
            $existingGallery,
            array_filter((array) $request->input('remove_gallery', []))
        ));

        foreach ($removeGallery as $galleryPath) {
            if (! str_starts_with($galleryPath, 'seed/')) {
                Storage::disk('public')->delete($galleryPath);
            }
        }

        $existingGallery = array_values(array_diff($existingGallery, $removeGallery));
        $newGallery = $request->hasFile('gallery') ? $this->gallery($request) : [];
        $data['gallery'] = array_values(array_unique(array_merge($existingGallery, $newGallery)));

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }


    public function duplicate(Product $product)
    {
        $copy = $product->replicate();
        $copy->name = $product->name.' Copy';
        $copy->slug = Str::slug($product->slug.'-copy-'.now()->format('His'));
        $copy->sku = $product->sku ? $product->sku.'-COPY' : null;
        $copy->is_active = false;
        $copy->is_featured = false;
        $copy->save();

        return redirect()->route('admin.products.edit', $copy)->with('success', 'Product duplicated. Review the copy before publishing.');
    }

    public function destroy(Product $product)
    {
        if ($product->image && ! str_starts_with($product->image, 'seed/') && ! str_starts_with($product->image, 'builtin/')) {
            Storage::disk('public')->delete($product->image);
        }

        foreach ((array) ($product->gallery ?? []) as $galleryPath) {
            if ($galleryPath && ! str_starts_with($galleryPath, 'seed/') && ! str_starts_with($galleryPath, 'builtin/')) {
                Storage::disk('public')->delete($galleryPath);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }

    private function data(Request $request, $id = null): array
    {
        return $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:190',
            'slug' => 'nullable|max:190|unique:products,slug,'.$id,
            'sku' => 'nullable|max:100',
            'short_description' => 'nullable|max:1500',
            'description' => 'nullable|max:20000',
            'care_instructions' => 'nullable|max:10000',
            'usage_notes' => 'nullable|max:10000',
            'sort_order' => 'nullable|integer|min:0',
            'seo_title' => 'nullable|max:190',
            'seo_description' => 'nullable|max:500',
            'image' => 'nullable|image|max:8192',
            'gallery.*' => 'nullable|image|max:8192',
            'remove_gallery' => 'nullable|array',
            'remove_gallery.*' => 'nullable|string|max:500',
        ]) + [
            'is_active' => $request->boolean('is_active'),
            'is_featured' => $request->boolean('is_featured'),
        ];
    }

    private function upload(Request $request, string $field, string $directory): ?string
    {
        return $request->hasFile($field)
            ? $request->file($field)->store($directory, 'public')
            : null;
    }

    private function gallery(Request $request): array
    {
        $files = [];
        foreach ($request->file('gallery', []) as $file) {
            $files[] = $file->store('products/gallery', 'public');
        }

        return $files;
    }

    private function variants($value): array
    {
        $variants = [];
        foreach ($this->lines($value) as $line) {
            $parts = array_map('trim', explode('|', $line, 4));
            $name = $parts[0] ?? '';
            if ($name === '') {
                continue;
            }

            $variants[] = [
                'name' => $name,
                'sku' => $parts[1] ?? '',
                'material' => $parts[2] ?? '',
                'notes' => $parts[3] ?? '',
            ];
        }

        return $variants;
    }

    private function lines($value): array
    {
        return array_values(array_filter(array_map(
            'trim',
            preg_split('/\r\n|\r|\n/', (string) $value)
        )));
    }

    private function specs($value): array
    {
        $specifications = [];
        foreach ($this->lines($value) as $line) {
            [$key, $item] = array_pad(explode(':', $line, 2), 2, '');
            if (trim($key) !== '') {
                $specifications[trim($key)] = trim($item);
            }
        }

        return $specifications;
    }
}
