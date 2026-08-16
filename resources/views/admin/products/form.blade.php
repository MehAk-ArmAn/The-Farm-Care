@extends('admin.layout')
@section('heading', $product->exists ? 'Edit Product' : 'Add Product')
@section('back_url', route('admin.products.index'))
@section('back_label','Products')
@section('content')
<form class="panel" method="post" enctype="multipart/form-data" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}">
    @csrf
    @if($product->exists) @method('PUT') @endif

    <div class="panel-head"><h2>Basic Product Information</h2></div>
    <div class="grid2">
        <div class="field"><label>Product Name *</label><input name="name" value="{{ old('name', $product->name) }}" required></div>
        <div class="field"><label>Category *</label><select name="category_id" required>@foreach($categories as $c)<option value="{{ $c->id }}" @selected(old('category_id', $product->category_id)==$c->id)>{{ $c->name }}</option>@endforeach</select></div>
        <div class="field"><label>Slug</label><input name="slug" value="{{ old('slug', $product->slug) }}"><span class="hint">Leave blank to generate automatically.</span></div>
        <div class="field"><label>SKU</label><input name="sku" value="{{ old('sku', $product->sku) }}"></div>
        <div class="field full"><label>Short Description</label><textarea name="short_description" style="min-height:90px">{{ old('short_description', $product->short_description) }}</textarea><span class="hint">Shown near the product title and on product cards.</span></div>
        <div class="field full"><label>Complete Product Overview</label><textarea name="description" style="min-height:190px">{{ old('description', $product->description) }}</textarea><span class="hint">Use a complete buyer-friendly overview: what it is, who it is for, construction and intended professional use.</span></div>
    </div>

    <div class="panel-head admin-section-head"><h2>Detailed Product Content</h2></div>
    <div class="grid2">
        <div class="field"><label>Key Features</label><textarea name="features_text" style="min-height:170px">{{ old('features_text', implode("\n", $product->features ?? [])) }}</textarea><span class="hint">One feature per line.</span></div>
        <div class="field"><label>Customer Benefits</label><textarea name="benefits_text" style="min-height:170px">{{ old('benefits_text', implode("\n", $product->benefits ?? [])) }}</textarea><span class="hint">One benefit per line.</span></div>
        <div class="field"><label>Applications / Suitable For</label><textarea name="applications_text" style="min-height:150px">{{ old('applications_text', implode("\n", $product->applications ?? [])) }}</textarea><span class="hint">One application per line.</span></div>
        <div class="field"><label>Package Contents</label><textarea name="package_contents_text" style="min-height:150px">{{ old('package_contents_text', implode("\n", $product->package_contents ?? [])) }}</textarea><span class="hint">One supplied item per line.</span></div>
        <div class="field full"><label>Technical Specifications</label><textarea name="specifications_text" style="min-height:190px">{{ old('specifications_text', collect($product->specifications ?? [])->map(fn($v,$k)=>$k.': '.$v)->implode("\n")) }}</textarea><span class="hint">One per line, for example: Material: Stainless Steel</span></div>
        <div class="field full">
            <label>Product Variants / Models</label>
            <textarea name="variants_text" style="min-height:170px">{{ old('variants_text', collect($product->variants ?? [])->map(fn($v) => ($v['name'] ?? '').' | '.($v['sku'] ?? '').' | '.($v['material'] ?? '').' | '.($v['notes'] ?? ''))->implode("\n")) }}</textarea>
            <span class="hint">One variant per line: Variant Name | SKU | Material | Notes. Example: Stainless Steel Model | BNR-SS | Stainless Steel | Standard professional model</span>
        </div>
        <div class="field"><label>Cleaning / Care Instructions</label><textarea name="care_instructions" style="min-height:150px">{{ old('care_instructions', $product->care_instructions) }}</textarea></div>
        <div class="field"><label>Professional Use / Important Notes</label><textarea name="usage_notes" style="min-height:150px">{{ old('usage_notes', $product->usage_notes) }}</textarea></div>
    </div>

    <div class="panel-head admin-section-head"><h2>Images & Gallery</h2></div>
    <div class="grid2">
        <div class="field">
            <label>Main High-Resolution Image</label>
            <input type="file" name="image" accept="image/*">
            <span class="hint">Recommended: square image, at least 1200 × 1200 px, JPG/PNG/WebP.</span>
            @if($product->image)
                <div class="main-image-preview"><img src="{{ \App\Support\MediaUrl::make($product->image) }}" alt="Current main image"></div>
            @endif
        </div>

        <div class="field">
            <label>Add Gallery Images</label>
            <input type="file" name="gallery[]" accept="image/*" multiple>
            <span class="hint">Upload genuine alternative views, close-ups, model variants, packaging or product-use images. The public gallery never repeats the main image as a fake thumbnail.</span>
        </div>

        @if(!empty($product->gallery))
            <div class="field full">
                <label>Current Gallery — select any image to remove when saving</label>
                <div class="admin-gallery-grid">
                    @foreach($product->gallery as $galleryImage)
                        <label class="admin-gallery-item">
                            <img src="{{ \App\Support\MediaUrl::make($galleryImage) }}" alt="Product gallery image">
                            <span><input type="checkbox" name="remove_gallery[]" value="{{ $galleryImage }}"> Remove</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <div class="panel-head admin-section-head"><h2>Display & SEO</h2></div>
    <div class="grid2">
        <div class="field"><label>Sort Order</label><input type="number" name="sort_order" value="{{ old('sort_order', $product->sort_order ?? 0) }}"></div>
        <div class="field"><label>SEO Title</label><input name="seo_title" value="{{ old('seo_title', $product->seo_title) }}"></div>
        <div class="field full"><label>SEO Description</label><textarea name="seo_description" style="min-height:85px">{{ old('seo_description', $product->seo_description) }}</textarea></div>
        <div class="field full"><label><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->exists ? $product->is_active : true))> Active</label> &nbsp;&nbsp; <label><input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $product->is_featured))> Featured</label></div>
        <div class="field full"><div class="actions"><button class="btn btn-primary">Save Product</button><a class="btn btn-outline" href="{{ route('admin.products.index') }}">Cancel</a></div></div>
    </div>
</form>
@if($product->exists)
<div class="panel danger-zone">
    <div><strong>Delete Product</strong><p>Permanently remove this product and its uploaded product media. This cannot be undone.</p></div>
    <form method="post" action="{{ route('admin.products.destroy',$product) }}" onsubmit="return confirm('Permanently delete this product?')">@csrf @method('DELETE')<button class="btn btn-danger" type="submit">Delete Product</button></form>
</div>
@endif
@endsection
