<nav class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('images/logo/logo.png') }}" alt="The Farm Care Logo" class="h-12 w-auto">
            <div class="hidden sm:block">
                <p class="text-lg font-bold text-slate-900">The Farm Care</p>
                <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Vet Equipment & Nutrition</p>
            </div>
        </a>

        <div class="hidden gap-6 md:flex items-center">
            <a href="{{ route('home') }}" class="text-sm font-medium text-slate-700 hover:text-[var(--brand-green)]">Home</a>
            <a href="{{ route('products.index') }}" class="text-sm font-medium text-slate-700 hover:text-[var(--brand-green)]">Products</a>
            <a href="#about" class="text-sm font-medium text-slate-700 hover:text-[var(--brand-green)]">About</a>
            <a href="#contact" class="text-sm font-medium text-slate-700 hover:text-[var(--brand-green)]">Contact</a>
            <a href="#contact" class="rounded-full bg-[var(--brand-green)] px-5 py-3 text-sm font-semibold text-white transition hover:opacity-90">
                Get a Quote
            </a>
        </div>
    </div>
</nav>
