<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- responsive -->
    <title>Create Product | The Farm Care</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen p-6">

    <!-- page wrapper -->
    <div class="mx-auto max-w-5xl">
        <!-- page top -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Add New Product</h1>
                <p class="mt-1 text-sm text-slate-600">
                    Create a complete product with price, slug, content, options, status, and images.
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

        <!-- main card -->
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">
            <!-- card header -->
            <div class="bg-[var(--brand-green)] px-8 py-5">
                <h2 class="text-lg font-semibold text-strong">Product Details</h2>
            </div>

            <!-- form -->
            <form method="POST"
                  action="{{ route('admin.products.store') }}"
                  enctype="multipart/form-data"
                  class="space-y-6 p-8">
                @csrf

                <!-- grid -->
                <div class="grid gap-6 md:grid-cols-2">

                    <!-- category -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Category</label>
                        <select name="category_id"
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                               value="{{ old('sku') }}"
                               placeholder="e.g. FC-1024"
                               class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">
                    </div>

                    <!-- price -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Price</label>
                        <input type="number"
                               step="0.01"
                               name="price"
                               value="{{ old('price', 0) }}"
                               placeholder="e.g. 25.00"
                               class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">
                    </div>

                    <!-- slug -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Slug (optional)</label>
                        <input type="text"
                               name="slug"
                               value="{{ old('slug') }}"
                               placeholder="auto-generated if left empty"
                               class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">
                    </div>

                    <!-- product name -->
                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-slate-700">Product Name</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="e.g. Fig. 23 Lower Molars, Right"
                               class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">
                    </div>

                    <!-- short title -->
                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-slate-700">Short Title</label>
                        <input type="text"
                               name="short_title"
                               value="{{ old('short_title') }}"
                               placeholder="e.g. Dental Extracting Forceps"
                               class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">
                    </div>

                    <!-- short description -->
                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-slate-700">Short Description</label>
                        <textarea name="short_description"
                                  rows="3"
                                  placeholder="Short card description for listing page"
                                  class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">{{ old('short_description') }}</textarea>
                    </div>

                    <!-- full description -->
                    <div class="md:col-span-2">
                        <label class="mb-1 block text-sm font-medium text-slate-700">Full Description</label>
                        <textarea name="description"
                                  rows="6"
                                  placeholder="Detailed product description"
                                  class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">{{ old('description') }}</textarea>
                    </div>

                    <!-- featured image -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Featured Image</label>
                        <input type="file"
                               name="featured_image"
                               id="featured-image-input"
                               accept="image/*"
                               onchange="previewFeaturedImage(event)"
                               class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:bg-green-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-green-700 hover:file:bg-green-100">

                        <!-- featured preview -->
                        <div id="featured-image-preview" class="mt-3 hidden">
                            <div class="relative inline-block">
                                <img id="featured-preview-img"
                                     src=""
                                     alt="Featured Preview"
                                     class="h-28 w-28 rounded-2xl border border-slate-200 object-cover shadow-sm">
                                <button type="button"
                                        onclick="removeFeaturedImage()"
                                        class="absolute -right-2 -top-2 flex h-7 w-7 items-center justify-center rounded-full bg-red-600 text-xs font-bold text-white shadow-md transition hover:bg-red-700">
                                    ×
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- gallery images -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Product Gallery Images</label>
                        <input type="file"
                               name="images[]"
                               id="gallery-images-input"
                               accept="image/*"
                               multiple
                               onchange="previewGalleryImages(event)"
                               class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:bg-green-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-green-700 hover:file:bg-green-100">

                        <!-- gallery preview -->
                        <div id="gallery-images-preview" class="mt-3 grid grid-cols-2 gap-3 sm:grid-cols-3"></div>
                    </div>

                    <!-- sort order -->
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Sort Order</label>
                        <input type="number"
                               name="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">
                    </div>

                    <!-- featured -->
                    <div class="flex items-center gap-3">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               {{ old('is_featured') ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-slate-300 text-green-600 focus:ring-green-500">
                        <label class="text-sm font-medium text-slate-700">Featured Product</label>
                    </div>

                    <!-- active -->
                    <div class="flex items-center gap-3">
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               {{ old('is_active', 1) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-slate-300 text-green-600 focus:ring-green-500">
                        <label class="text-sm font-medium text-slate-700">Active Product</label>
                    </div>

                    <!-- product options -->
                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-slate-700">Product Options</label>

                        <!-- wrapper for dynamic option fields -->
                        <div id="options-wrapper" class="space-y-3">
                            @php
                                $oldOptions = old('options', ['']);
                            @endphp

                            @foreach($oldOptions as $option)
                                <div class="option-row flex items-center gap-3">
                                    <input type="text"
                                           name="options[]"
                                           value="{{ $option }}"
                                           placeholder="e.g. Small / Large / 12cm / Straight / Left"
                                           class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">

                                    <button type="button"
                                            onclick="removeOptionField(this)"
                                            class="shrink-0 rounded-full border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-600 transition hover:bg-red-100 hover:text-red-700">
                                        Delete
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <!-- add option button -->
                        <button type="button"
                                onclick="addOptionField()"
                                class="mt-3 rounded-full border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-green-600 hover:text-green-700">
                            + Add Option
                        </button>

                        <p class="mt-2 text-xs text-slate-500">
                            Example: size, type, variation, left/right, straight/curved, etc.
                        </p>
                    </div>
                </div>

                <!-- actions -->
                <div class="flex items-center justify-end gap-4 border-t border-slate-100 pt-6">
                    <a href="{{ route('admin.products.index') }}"
                       class="text-sm font-medium text-slate-600 transition hover:text-slate-900">
                        Cancel
                    </a>

                    <button type="submit"
                            class="rounded-xl bg-[var(--brand-green)] px-8 py-3 text-sm font-bold text-strong shadow-lg transition hover:bg-green-700 hover:shadow-xl">
                        Create Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let galleryFiles = [];

        function addOptionField(value = '') {
            const wrapper = document.getElementById('options-wrapper');

            const row = document.createElement('div');
            row.className = 'option-row flex items-center gap-3';

            row.innerHTML = `
                <input type="text"
                       name="options[]"
                       value="${value}"
                       placeholder="e.g. Small / Large / 12cm / Straight / Left"
                       class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-green-600 focus:ring-2 focus:ring-green-100">

                <button type="button"
                        onclick="removeOptionField(this)"
                        class="shrink-0 rounded-full border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-600 transition hover:bg-red-100 hover:text-red-700">
                    Delete
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
                const input = rows[0].querySelector('input');
                input.value = '';
            }
        }

        function previewFeaturedImage(event) {
            const file = event.target.files[0];
            const previewWrapper = document.getElementById('featured-image-preview');
            const previewImage = document.getElementById('featured-preview-img');

            if (!file) {
                previewWrapper.classList.add('hidden');
                previewImage.src = '';
                return;
            }

            previewImage.src = URL.createObjectURL(file);
            previewWrapper.classList.remove('hidden');
        }

        function removeFeaturedImage() {
            const input = document.getElementById('featured-image-input');
            const previewWrapper = document.getElementById('featured-image-preview');
            const previewImage = document.getElementById('featured-preview-img');

            input.value = '';
            previewImage.src = '';
            previewWrapper.classList.add('hidden');
        }

        function previewGalleryImages(event) {
            galleryFiles = Array.from(event.target.files);
            syncGalleryInput();
            renderGalleryPreview();
        }

        function renderGalleryPreview() {
            const preview = document.getElementById('gallery-images-preview');
            preview.innerHTML = '';

            galleryFiles.forEach((file, index) => {
                const url = URL.createObjectURL(file);

                const item = document.createElement('div');
                item.className = 'relative';

                item.innerHTML = `
                    <img src="${url}"
                         alt="Gallery Preview"
                         class="h-28 w-full rounded-2xl border border-slate-200 object-cover shadow-sm">

                    <button type="button"
                            onclick="removeGalleryImage(${index})"
                            class="absolute -right-2 -top-2 flex h-7 w-7 items-center justify-center rounded-full bg-red-600 text-xs font-bold text-white shadow-md transition hover:bg-red-700">
                        ×
                    </button>
                `;

                preview.appendChild(item);
            });
        }

        function removeGalleryImage(index) {
            galleryFiles.splice(index, 1);
            syncGalleryInput();
            renderGalleryPreview();
        }

        function syncGalleryInput() {
            const input = document.getElementById('gallery-images-input');
            const dataTransfer = new DataTransfer();

            galleryFiles.forEach(file => dataTransfer.items.add(file));

            input.files = dataTransfer.files;
        }
    </script>

</body>
</html>
