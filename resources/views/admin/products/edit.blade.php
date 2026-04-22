<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- responsive -->
    <title>Edit Product | The Farm Care</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen p-6">

    <!-- page wrapper -->
    <div class="mx-auto max-w-5xl">
        <!-- page top -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Edit Product #{{ $product->id }}</h1>
                <p class="mt-1 text-sm text-slate-600">
                    Update product information, price, options, status, featured image, and gallery images.
                </p>
            </div>

            <a href="{{ route('admin.products.index') }}"
               class="rounded-full border border-slate-300 px-5 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:text-slate-900">
                Back
            </a>
        </div>

        <!-- validation errors -->
        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- success -->
        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <!-- form -->
        <form method="POST"
              action="{{ route('admin.products.update', $product->id) }}"
              enctype="multipart/form-data"
              class="space-y-6 rounded-3xl border border-slate-200 bg-white p-8 shadow-xl">
            @csrf
            @method('PUT')

            <!-- hidden delete flags -->
            <input type="hidden" name="deleted_images" id="deleted_images">

            <!-- grid -->
            <div class="grid gap-6 md:grid-cols-2">

                <!-- category -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Category</label>
                    <select name="category_id"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
                        <option value="">Select category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- sku -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">SKU</label>
                    <input type="text"
                           name="sku"
                           value="{{ old('sku', $product->sku) }}"
                           placeholder="e.g. FC-1024"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
                </div>

                <!-- price -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Price</label>
                    <input type="number"
                           step="0.01"
                           name="price"
                           value="{{ old('price', $product->price) }}"
                           placeholder="e.g. 25.00"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
                </div>

                <!-- slug -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Slug</label>
                    <input type="text"
                           name="slug"
                           value="{{ old('slug', $product->slug) }}"
                           placeholder="custom url slug"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
                </div>

                <!-- product name -->
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Product Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $product->name) }}"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
                </div>

                <!-- short title -->
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Short Title</label>
                    <input type="text"
                           name="short_title"
                           value="{{ old('short_title', $product->short_title) }}"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
                </div>

                <!-- short description -->
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Short Description</label>
                    <textarea name="short_description"
                              rows="3"
                              class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">{{ old('short_description', $product->short_description) }}</textarea>
                </div>

                <!-- full description -->
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Full Description</label>
                    <textarea name="description"
                              rows="6"
                              class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- replace featured image -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Replace Featured Image</label>
                    <input type="file"
                           name="featured_image"
                           id="featured-image-input"
                           accept="image/*"
                           onchange="previewFeaturedImage(event)"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100">

                    <!-- preview for newly selected featured image -->
                    <div id="featured-image-preview" class="mt-3 hidden">
                        <div class="relative inline-block">
                            <img id="featured-preview-img"
                                 src=""
                                 alt="Featured Preview"
                                 class="h-28 w-28 rounded-2xl border border-slate-200 object-cover shadow-sm">
                            <button type="button"
                                    onclick="removeSelectedFeaturedImage()"
                                    class="absolute -right-2 -top-2 flex h-7 w-7 items-center justify-center rounded-full bg-red-600 text-xs font-bold text-white shadow-md transition hover:bg-red-700">
                                ×
                            </button>
                        </div>
                    </div>
                </div>

                <!-- upload more gallery images -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Upload New Gallery Images</label>
                    <input type="file"
                           name="images[]"
                           id="gallery-images-input"
                           accept="image/*"
                           multiple
                           onchange="previewGalleryImages(event)"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100">

                    <!-- preview for newly selected gallery images -->
                    <div id="gallery-images-preview" class="mt-3 grid grid-cols-2 gap-3 sm:grid-cols-3"></div>
                </div>

                <!-- sort order -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           value="{{ old('sort_order', $product->sort_order) }}"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
                </div>

                <!-- featured -->
                <div class="flex items-center gap-3">
                    <input type="checkbox"
                           name="is_featured"
                           value="1"
                           {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                    <label class="text-sm font-medium text-slate-700">Featured Product</label>
                </div>

                <!-- active -->
                <div class="flex items-center gap-3">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                    <label class="text-sm font-medium text-slate-700">Active Product</label>
                </div>

                <!-- product options -->
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-medium text-slate-700">Product Options</label>

                    <div id="options-wrapper" class="space-y-3">
                        @php
                            $editOptions = old('options', $product->options->pluck('option_name')->toArray() ?: ['']);
                        @endphp

                        @foreach($editOptions as $option)
                            <div class="option-row flex items-center gap-3">
                                <input type="text"
                                       name="options[]"
                                       value="{{ $option }}"
                                       placeholder="e.g. Small / Large / 12cm / Straight / Left"
                                       class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">

                                <button type="button"
                                        onclick="removeOptionField(this)"
                                        class="shrink-0 rounded-full border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-600 transition hover:bg-red-100 hover:text-red-700">
                                    Delete
                                </button>
                            </div>
                        @endforeach
                    </div>

                    <button type="button"
                            onclick="addOptionField()"
                            class="mt-3 rounded-full border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-blue-600 hover:text-blue-700">
                        + Add Option
                    </button>

                    <p class="mt-2 text-xs text-slate-500">
                        Updating this product will replace old saved options with the current list entered here.
                    </p>
                </div>
            </div>

            <!-- current featured image -->
            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">Current Featured Image</label>

                @if($product->featured_image)
                    <div id="current-featured-image-box" class="relative inline-block">
                        <img
                            src="{{ asset('images/products/' . urlencode($product->featured_image)) }}"
                            alt="{{ $product->name }}"
                            class="h-44 w-44 rounded-2xl border border-slate-200 object-cover"
                        >

                        <button type="button"
                                onclick="removeCurrentFeaturedImage()"
                                class="absolute -right-2 -top-2 flex h-8 w-8 items-center justify-center rounded-full bg-red-600 text-sm font-bold text-white shadow-md transition hover:bg-red-700">
                            ×
                        </button>
                    </div>

                    <p id="current-featured-image-removed-text" class="hidden text-sm font-medium text-red-600">
                        Current featured image will be deleted when you update this product.
                    </p>
                @else
                    <p class="text-sm text-slate-500">No featured image.</p>
                @endif
            </div>

            <!-- current gallery -->
            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">Current Gallery Images</label>

                @if($product->images && $product->images->count())
                    <div class="flex flex-wrap gap-4">
                        @foreach($product->images as $image)
                            <div class="relative gallery-existing-item" id="gallery-image-{{ $image->id }}">
                                <input type="hidden"
                                    name="existing_images[]"
                                    value="{{ $image->id }}"
                                    id="existing-input-{{ $image->id }}">

                                <img
                                    src="{{ asset('images/products/' . urlencode($image->image_path)) }}"
                                    alt="{{ $product->name }}"
                                    class="h-24 w-24 rounded-2xl border border-slate-200 object-cover"
                                >

                                <button type="button"
                                        onclick="markGalleryDelete({{ $image->id }})"
                                        class="absolute -right-2 -top-2 flex h-7 w-7 items-center justify-center rounded-full bg-red-600 text-xs font-bold text-white shadow-md transition hover:bg-red-700">
                                    ×
                                </button>
                            </div>
                        @endforeach
                    </div>

                    <p class="mt-2 text-xs text-slate-500">
                        Deleted gallery images will be removed when you update this product.
                    </p>
                @else
                    <p class="text-sm text-slate-500">No gallery images.</p>
                @endif
            </div>

            <!-- action buttons -->
            <div class="flex items-center justify-end gap-4 border-t border-slate-100 pt-6">
                <a href="{{ route('admin.products.index') }}"
                   class="text-sm font-medium text-slate-600 transition hover:text-slate-900">
                    Cancel
                </a>

                <button type="submit"
                        class="rounded-xl bg-blue-600 px-8 py-3 text-sm font-bold text-strong shadow-lg transition hover:bg-blue-700 hover:shadow-xl">
                    Update Product
                </button>
            </div>
        </form>
    </div>

    <script>
let galleryFiles = [];
let deletedImages = [];

function addOptionField(value = '') {
    const wrapper = document.getElementById('options-wrapper');

    const row = document.createElement('div');
    row.className = 'option-row flex items-center gap-3';

    row.innerHTML = `
        <input type="text"
               name="options[]"
               value="${value}"
               class="w-full rounded-xl border border-slate-300 px-4 py-3">

        <button type="button"
                onclick="removeOptionField(this)"
                class="px-4 py-3 text-red-600">
            ×
        </button>
    `;

    wrapper.appendChild(row);
}

function removeOptionField(button) {
    const wrapper = document.getElementById('options-wrapper');
    const rows = wrapper.querySelectorAll('.option-row');

    if (rows.length > 1) {
        button.closest('.option-row').remove();
    } else {
        rows[0].querySelector('input').value = '';
    }
}

function previewFeaturedImage(event) {
    const file = event.target.files[0];
    const previewWrapper = document.getElementById('featured-image-preview');
    const previewImage = document.getElementById('featured-preview-img');

    if (!file) return;

    previewImage.src = URL.createObjectURL(file);
    previewWrapper.classList.remove('hidden');
}

function removeSelectedFeaturedImage() {
    document.getElementById('featured-image-input').value = '';
    document.getElementById('featured-image-preview').classList.add('hidden');
}

function removeCurrentFeaturedImage() {
    document.getElementById('current-featured-image-box')?.remove();
    document.getElementById('current-featured-image-removed-text')?.classList.remove('hidden');
    document.getElementById('remove_featured_image').value = '1';
}

function previewGalleryImages(event) {
    galleryFiles = Array.from(event.target.files);
    renderGalleryPreview();
    syncGalleryInput();
}

function renderGalleryPreview() {
    const preview = document.getElementById('gallery-images-preview');
    preview.innerHTML = '';

    galleryFiles.forEach((file, index) => {
        const url = URL.createObjectURL(file);

        preview.innerHTML += `
            <div class="relative">
                <img src="${url}" class="h-28 w-full object-cover rounded-xl">
                <button type="button"
                        onclick="removeGalleryImage(${index})"
                        class="absolute top-1 right-1 bg-red-600 text-white px-2 rounded">
                    ×
                </button>
            </div>
        `;
    });
}

function removeGalleryImage(index) {
    galleryFiles.splice(index, 1);
    renderGalleryPreview();
    syncGalleryInput();
}

function syncGalleryInput() {
    const input = document.getElementById('gallery-images-input');
    const dt = new DataTransfer();

    galleryFiles.forEach(file => dt.items.add(file));

    input.files = dt.files;
}

function markGalleryDelete(imageId) {
    const item = document.getElementById(`gallery-image-${imageId}`);

    if (item) item.remove();

    deletedImages.push(imageId);
}

/* SAFE form hook */
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    if (!form) return;

    form.addEventListener('submit', function () {
        let hidden = document.getElementById('deleted_images');

        if (!hidden) {
            hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'deleted_images';
            hidden.id = 'deleted_images';
            form.appendChild(hidden);
        }

        hidden.value = JSON.stringify(deletedImages);
    });
});
</script>

</body>
</html>
