<footer class="mt-20 overflow-hidden border-t border-[#D9E5DB] bg-gradient-to-b from-white to-[#EEF6EF]">
    <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

        {{-- soft background accents --}}
        <div class="pointer-events-none absolute -left-10 bottom-0 h-56 w-56 rounded-full bg-[#2F6B3B]/5 blur-[90px]"></div>
        <div class="pointer-events-none absolute right-0 top-0 h-48 w-48 rounded-full bg-[#6E8B74]/10 blur-[90px]"></div>

        <div class="relative z-10 grid gap-12 md:grid-cols-2 lg:grid-cols-4">

            {{-- Column 1: Branding & About --}}
            <div class="col-span-1 md:col-span-2 lg:col-span-1">
                <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-[#D9E5DB] bg-white shadow-sm">
                        <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="h-10 w-10 object-contain">
                    </div>
                    <p class="text-xl font-black uppercase tracking-tight text-[#111827]">The Farm Care</p>
                </div>

                <p class="mt-6 max-w-sm text-sm leading-8 text-[#4B5563]">
                    Precision-crafted veterinary equipment and nutrition solutions since 2011.
                    Exporting excellence from Sialkot to the world.
                </p>

                <div class="mt-8 flex gap-3">
                    {{-- Facebook Icon --}}
                    <a href="https://www.facebook.com/p/Farm-carecompk-100071781707572/" target="_blank" class="h-11 w-11 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-[#1877F2] hover:border-[#1877F2] transition-all duration-300 group shadow-lg">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-strong transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                    </a>

                    {{-- Instagram Icon --}}
                    <a href="https://www.instagram.com/farmc57care.pk/" target="_blank" class="h-11 w-11 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-gradient-to-tr hover:from-[#f9ce34] hover:via-[#ee2a7b] hover:to-[#6228d7] hover:border-transparent transition-all duration-300 group shadow-lg">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-strong transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Column 2: Navigation Links --}}
            <div>
                <h4 class="text-xs font-black uppercase tracking-[0.3em] text-[#2F6B3B]">Navigation</h4>
                <ul class="mt-6 space-y-4 text-sm font-semibold text-[#4B5563]">
                    <li><a href="{{ route('home') }}" class="transition hover:text-[#2F6B3B]">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="transition hover:text-[#2F6B3B]">All Products</a></li>
                    <li><a href="/#about" class="transition hover:text-[#2F6B3B]">About Us</a></li>
                    <li><a href="/#contact" class="transition hover:text-[#2F6B3B]">Contact Us</a></li>
                    <li><a href="/inquiry" class="transition hover:text-[#2F6B3B]">Inquiry</a></li>
                </ul>
            </div>

            {{-- Column 3: Categories --}}
            <div>
                <h4 class="text-xs font-black uppercase tracking-[0.3em] text-[#2F6B3B]">Categories</h4>
                <ul class="mt-6 space-y-4 text-sm font-semibold text-[#4B5563]">
                    <li><a href="{{ route('products.byCategory', 1) }}">Dental Instruments</a></li> <!-- id = 1 -->
                    <li><a href="{{ route('products.byCategory', 2) }}">Veterinary  Instruments</a></li>
                    <li><a href="{{ route('products.byCategory', 3) }}">Hunting Knives</a></li>
                    <!-- <li><a href="{{ route('products.byCategory', 4) }}">Animal Nutrition</a></li> -->
                </ul>
            </div>

            {{-- Column 4: Global Support --}}
            <div>
                <h4 class="text-xs font-black uppercase tracking-[0.3em] text-[#2F6B3B]">Global Office</h4>

                <div class="mt-6 space-y-4">
                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 shrink-0 text-[#2F6B3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <p class="text-sm text-[#4B5563]">Sialkot, 51310 Pakistan</p>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 shrink-0 text-[#2F6B3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <p class="text-sm font-bold text-[#111827]">+92 300 613 1926</p>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 shrink-0 text-[#2F6B3B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <p class="text-sm text-[#4B5563]">info@thefarmcare.com</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom copyright --}}
        <div class="mt-16 flex flex-col items-center justify-between gap-4 border-t border-[#D9E5DB] pt-8 text-[10px] font-black uppercase tracking-[0.25em] text-[#6B7280] md:flex-row">
            <p>&copy; {{ date('Y') }} THE FARM CARE. ALL RIGHTS RESERVED.</p>

            <div class="flex gap-6">
                <a href="/privacy-policy" class="transition hover:text-[#2F6B3B]">Privacy Policy</a>
                <a href="/terms" class="transition hover:text-[#2F6B3B]">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
