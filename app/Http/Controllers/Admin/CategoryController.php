<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::withCount('products')->orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.categories.form', ['category' => new Category]);
    }

    public function store(Request $request)
    {
        $data = $this->data($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['image'] = $this->upload($request, 'image');
        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $this->data($request, $category->id);
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        if ($path = $this->upload($request, 'image')) {
            if ($category->image && ! str_starts_with($category->image, 'seed/') && ! str_starts_with($category->image, 'builtin/')) {
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = $path;
        }
        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated.');
    }

    public function duplicate(Category $category)
    {
        $copy = $category->replicate();
        $copy->name = $category->name.' Copy';
        $copy->slug = Str::slug($category->slug.'-copy-'.now()->format('His'));
        $copy->is_active = false;
        $copy->save();

        return redirect()->route('admin.categories.edit', $copy)->with('success', 'Category duplicated. Products were not copied.');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->exists()) {
            return back()->with('error', 'This category still contains products. Move or delete those products first.');
        }

        if ($category->image && ! str_starts_with($category->image, 'seed/') && ! str_starts_with($category->image, 'builtin/')) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();
        return back()->with('success', 'Category deleted.');
    }

    private function data(Request $request, $id = null): array
    {
        return $request->validate([
            'name' => 'required|max:190',
            'slug' => 'nullable|max:190|unique:categories,slug,'.$id,
            'description' => 'nullable|max:1500',
            'sort_order' => 'nullable|integer|min:0',
            'seo_title' => 'nullable|max:190',
            'seo_description' => 'nullable|max:500',
            'image' => 'nullable|image|max:4096',
        ]) + ['is_active' => $request->boolean('is_active')];
    }

    private function upload(Request $request, string $field): ?string
    {
        return $request->hasFile($field) ? $request->file($field)->store('categories', 'public') : null;
    }
}
