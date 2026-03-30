<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - The Farm Care</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Admin Dashboard</h1>
                <p class="mt-2 text-slate-600">Welcome, {{ auth()->user()->name }}</p>
            </div>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="rounded-full bg-slate-900 px-5 py-3 text-sm font-semibold text-white">
                    Logout
                </button>
            </form>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            <div class="rounded-3xl bg-white p-6 shadow">
                <h2 class="text-lg font-semibold text-slate-900">Products</h2>
                <p class="mt-2 text-sm text-slate-600">Manage all products here.</p>
            </div>

            <div class="rounded-3xl bg-white p-6 shadow">
                <h2 class="text-lg font-semibold text-slate-900">Categories</h2>
                <p class="mt-2 text-sm text-slate-600">Manage product categories.</p>
            </div>

            <div class="rounded-3xl bg-white p-6 shadow">
                <h2 class="text-lg font-semibold text-slate-900">Inquiries</h2>
                <p class="mt-2 text-sm text-slate-600">Check incoming business messages.</p>
            </div>
        </div>
    </div>
</body>
</html>
