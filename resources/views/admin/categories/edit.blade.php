<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- responsive -->
    <title>Edit Category | The Farm Care</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen p-6">

    <!-- wrap -->
    <div class="mx-auto max-w-3xl">
        <!-- top -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Edit Category #{{ $category->id }}</h1>
                <p class="mt-1 text-sm text-slate-600">Update category details and status.</p>
            </div>

            <a href="{{ route('admin.categories.index') }}"
               class="rounded-full border border-slate-300 px-5 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:text-slate-900">
                Back
            </a>
        </div>

        <!-- errors -->
        @if ($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- form -->
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}"
              class="space-y-6 rounded-3xl border border-slate-200 bg-white p-8 shadow-xl">
            @csrf
            @method('PUT')

            <!-- name -->
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Category Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                       class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">
            </div>

            <!-- desc -->
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-700">Description</label>
                <textarea name="description" rows="5"
                          class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100">{{ old('description', $category->description) }}</textarea>
            </div>

            <!-- active -->
            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                       class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                <label class="text-sm font-medium text-slate-700">Active Category</label>
            </div>

            <!-- actions -->
            <div class="flex items-center justify-end gap-4 border-t border-slate-100 pt-6">
                <a href="{{ route('admin.categories.index') }}"
                   class="text-sm font-medium text-slate-600 transition hover:text-slate-900">
                    Cancel
                </a>

                <button type="submit"
                        class="rounded-xl bg-blue-600 px-8 py-3 text-sm font-bold text-strong shadow-lg transition hover:bg-blue-700 hover:shadow-xl">
                    Update Category
                </button>
            </div>
        </form>
    </div>

</body>
</html>
