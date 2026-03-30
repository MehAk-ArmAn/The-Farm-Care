<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - The Farm Care</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center px-4">
    <div class="w-full max-w-md rounded-3xl bg-white p-8 shadow-xl">
        <h1 class="text-3xl font-bold text-slate-900">Admin Login</h1>
        <p class="mt-2 text-sm text-slate-600">Sign in to manage The Farm Care website.</p>

        @if ($errors->any())
            <div class="mt-4 rounded-2xl bg-red-50 p-4 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="mt-6 space-y-4">
            @csrf

            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full rounded-2xl border border-slate-300 px-4 py-3 outline-none focus:border-green-700">
            </div>

            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">Password</label>
                <input type="password" name="password"
                       class="w-full rounded-2xl border border-slate-300 px-4 py-3 outline-none focus:border-green-700">
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" class="text-sm text-slate-600">Remember me</label>
            </div>

            <button type="submit"
                    class="w-full rounded-full bg-[var(--brand-green)] px-6 py-3 text-sm font-semibold text-white">
                Login
            </button>
        </form>
    </div>
</body>
</html>
