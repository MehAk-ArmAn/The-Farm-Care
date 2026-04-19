<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - The Farm Care</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="site-body min-h-screen">

<div class="site-shell min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-[260px] bg-[rgba(6,26,13,0.92)] text-white flex flex-col p-6 shadow-2xl">

        <h2 class="text-xl font-bold mb-8">🌿 Admin</h2>

        <nav class="flex flex-col gap-3 text-sm">

            <a href="{{ route('admin.dashboard') }}"
               class="rounded-xl px-4 py-3 hover:bg-white/10 transition">
                Dashboard
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="rounded-xl px-4 py-3 hover:bg-white/10 transition">
                Products
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="rounded-xl px-4 py-3 hover:bg-white/10 transition">
                Categories
            </a>

            <a href="{{ route('admin.testimonials.index') }}"
               class="rounded-xl px-4 py-3 hover:bg-white/10 transition">
                Testimonials
            </a>

            <a href="{{ route('admin.newsletter.index') }}"
               class="rounded-xl px-4 py-3 hover:bg-white/10 transition">
                Subscribers
            </a>

            <a href="{{ route('admin.newsletter.create') }}"
               class="rounded-xl px-4 py-3 bg-green-600 hover:bg-green-500 transition">
                Send Newsletter
            </a>

        </nav>

        <!-- logout -->
        <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto">
            @csrf
            <button type="submit"
                class="w-full rounded-xl bg-red-500 px-4 py-3 text-sm font-semibold hover:bg-red-400">
                Logout
            </button>
        </form>
    </aside>


    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8">

        <div class="max-w-7xl mx-auto">
            @yield('content')
        </div>

    </main>

</div>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Done',
                text: @json(session('success')),
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: @json(session('error')),
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

</body>
</html>
