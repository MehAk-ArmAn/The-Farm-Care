<nav class="navbar-glass" data-navbar>
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">

        {{-- Logo / Brand --}}
        <a href="{{ route('home') }}" class="group flex items-center gap-3">
            <div class="relative overflow-hidden rounded-2xl border border-[#D9E5DB] bg-white p-2 shadow-sm transition-all duration-300 group-hover:-translate-y-0.5 group-hover:border-[#2F6B3B]/30 group-hover:shadow-md">
                <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="h-10 w-auto object-contain">
            </div>

            <div class="hidden leading-tight sm:block">
                <p class="text-lg font-black tracking-tight text-[#111827]">THE FARM CARE</p>
                <p class="text-[10px] font-bold uppercase tracking-[0.3em] text-[#2F6B3B]">
                    Professional Solutions
                </p>
            </div>
        </a>

        {{-- Desktop Navigation --}}
        <div class="hidden items-center gap-8 md:flex">
            <a href="{{ route('home') }}"
               class="text-xs font-bold uppercase tracking-widest text-[#4B5563] transition hover:text-[#2F6B3B] {{ request()->routeIs('home') ? 'text-[#2F6B3B]' : '' }}">
                Home
            </a>

            <a href="{{ route('products.index') }}"
               class="text-xs font-bold uppercase tracking-widest text-[#4B5563] transition hover:text-[#2F6B3B] {{ request()->routeIs('products.*') ? 'text-[#2F6B3B]' : '' }}">
                Products
            </a>

            <a href="/#about"
               class="text-xs font-bold uppercase tracking-widest text-[#4B5563] transition hover:text-[#2F6B3B]">
                About
            </a>

            <a href="/contact"
               class="text-xs font-bold uppercase tracking-widest text-[#4B5563] transition hover:text-[#2F6B3B]">
                Contact
            </a>

            <a href="/inquiry"
               class="text-xs font-bold uppercase tracking-widest text-[#4B5563] transition hover:text-[#2F6B3B]">
                Inquiry

                @if($inquiryCount > 0)
                    <span class="absolute -top-2 -right-3 bg-[var(--brand-green)] text-white text-xs font-bold px-2 py-0.5 rounded-full">
                        {{ $inquiryCount }}
                    </span>
                @endif
            </a>

            <a href="/#contact"
               class="premium-btn premium-btn-primary rounded-xl px-7 py-3 text-xs font-black uppercase tracking-widest text-strong">
                Get a Quote
            </a>
        </div>

        {{-- Mobile quick action --}}
        <div class="md:hidden">
            <a href="/#contact"
               class="inline-flex items-center justify-center rounded-xl border border-[#D9E5DB] bg-white px-4 py-2 text-xs font-bold uppercase tracking-widest text-[#2F6B3B] shadow-sm transition hover:bg-[#EEF6EF]">
                Quote
            </a>
        </div>
    </div>
</nav>
