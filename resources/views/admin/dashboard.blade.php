<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- charset -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- responsive -->
    <title>Admin Dashboard - The Farm Care</title>

    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- vite assets -->
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-100 via-white to-green-50/30">

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="flex flex-col gap-5 rounded-[2rem] border border-slate-200 bg-white/90 p-8 shadow-xl backdrop-blur sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[var(--brand-green)]">
                    Admin Panel
                </p>
                <h1 class="mt-2 text-3xl font-extrabold text-slate-900 sm:text-4xl">
                    Welcome back, {{ auth()->user()->name }}
                </h1>
                <p class="mt-3 max-w-2xl text-slate-600">
                    Manage products, categories, inquiries, and newsletter subscribers from one place.
                </p>
            </div>

            <!-- REAL LOGOUT FORM -->
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    class="inline-flex items-center justify-center rounded-full bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow-md transition hover:-translate-y-0.5 hover:bg-slate-700">
                    Logout
                </button>
            </form>
        </div>

        <!-- CARDS -->
        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">

            <!-- PRODUCTS -->
            <div class="group rounded-[2rem] border border-slate-200 bg-white p-6 shadow-md transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-white shadow">
                    📦
                </div>
                <h2 class="mt-5 text-xl font-bold text-slate-900">Products</h2>
                <p class="mt-2 text-sm leading-7 text-slate-600">Manage all product records, images, options, pricing, and status.</p>

                <div class="mt-5 flex flex-wrap gap-2">
                    <a href="{{ route('admin.products.index') }}"
                       class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                        View
                    </a>

                    <a href="{{ route('admin.products.create') }}"
                       class="rounded-full bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-500">
                        Create
                    </a>
                </div>
            </div>

            <!-- CATEGORIES -->
            <div class="group rounded-[2rem] border border-slate-200 bg-white p-6 shadow-md transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-white shadow">
                    🗂️
                </div>
                <h2 class="mt-5 text-xl font-bold text-slate-900">Categories</h2>
                <p class="mt-2 text-sm leading-7 text-slate-600">Create and organize product categories for a cleaner product structure.</p>

                <div class="mt-5 flex flex-wrap gap-2">
                    <a href="{{ route('admin.categories.index') }}"
                       class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                        View
                    </a>

                    <a href="{{ route('admin.categories.create') }}"
                       class="rounded-full bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-500">
                        Create
                    </a>
                </div>
            </div>

            <!-- TESTIMONIALS -->
            <div class="group rounded-[2rem] border border-slate-200 bg-white p-6 shadow-md transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-white shadow">
                    💬
                </div>
                <h2 class="mt-5 text-xl font-bold text-slate-900">Testimonials</h2>
                <p class="mt-2 text-sm leading-7 text-slate-600">Manage customer feedback and trust-building content shown on the website.</p>

                <div class="mt-5 flex flex-wrap gap-2">
                    <a href="{{ route('admin.testimonials.index') }}"
                       class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                        View
                    </a>

                    <a href="{{ route('admin.testimonials.create') }}"
                       class="rounded-full bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-500">
                        Create
                    </a>
                </div>
            </div>

            <!-- NEWSLETTER -->
            <div class="group rounded-[2rem] border border-slate-200 bg-white p-6 shadow-md transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[var(--brand-green)] text-white shadow">
                    ✉️
                </div>
                <h2 class="mt-5 text-xl font-bold text-slate-900">Newsletter</h2>
                <p class="mt-2 text-sm leading-7 text-slate-600">View all newsletter subscribers collected from the homepage form.</p>

                <div class="mt-5 flex flex-wrap gap-2">
                    <a href="{{ route('admin.newsletter.index') }}"
                       class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                        View
                    </a>

                    <a href="{{ route('admin.newsletter.create') }}"
                       class="rounded-full bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-green-500">
                        Send Newsletter ✉️
                    </a>
                </div>
            </div>

            <!-- CONTACTS -->
            <div class="group rounded-[2rem] border border-slate-200 bg-white p-6 shadow-md transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-white shadow">
                    📩
                </div>

                <h2 class="mt-5 text-xl font-bold text-slate-900">Contacts</h2>
                <p class="mt-2 text-sm leading-7 text-slate-600">
                    View all customer contact form submissions from the website.
                </p>

                <div class="mt-5 flex flex-wrap gap-2">
                    <a href="{{ route('admin.contacts.index') }}"
                    class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                        View Messages
                    </a>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
