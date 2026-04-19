@extends('layouts.app')

@section('content')

{{-- =========================================================
   CONTACT PAGE (DARK GREEN GRADIENT BLOCK STYLE)
   ========================================================= --}}
<section
    class="py-20"
    style="
        background: linear-gradient(
            135deg,
            #0b1f12 0%,
            #0f2a18 50%,
            #0b1f12 100%
        );
    "
>

    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

        {{-- Glass Card --}}
        <div class="relative rounded-[2rem] border border-white/10 bg-white/5 p-8 backdrop-blur-md shadow-xl">

            {{-- Green glow --}}
            <div style="
                position:absolute;
                top:-60px;
                right:-60px;
                width:160px;
                height:160px;
                background:rgba(71,182,73,0.15);
                filter:blur(60px);
                border-radius:999px;
            "></div>

            {{-- Content --}}
            <div class="relative z-10">

                {{-- Heading --}}
                <h1 style="color: #ffffff;" class="text-3xl font-bold mb-6 text-white">
                    Contact Us
                </h1>

                {{-- Success --}}
                @if(session('success'))
                    <div class="mb-6 rounded-xl bg-green-500/10 border border-green-400/20 p-4 text-green-300">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Form --}}
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-300">
                            Name
                        </label>
                        <input type="text" name="name"
                            class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-white
                                   placeholder-slate-400 focus:border-green-400 focus:ring-2 focus:ring-green-300/30 focus:outline-none transition">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-300">
                            Email
                        </label>
                        <input type="email" name="email"
                            class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-white
                                   placeholder-slate-400 focus:border-green-400 focus:ring-2 focus:ring-green-300/30 focus:outline-none transition">
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-300">
                            Phone (optional)
                        </label>
                        <input type="text" name="phone"
                            class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-white
                                   placeholder-slate-400 focus:border-green-400 focus:ring-2 focus:ring-green-300/30 focus:outline-none transition">
                    </div>

                    {{-- Message --}}
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-300">
                            Message
                        </label>
                        <textarea name="message" rows="5"
                            class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-white
                                   placeholder-slate-400 focus:border-green-400 focus:ring-2 focus:ring-green-300/30 focus:outline-none transition"></textarea>
                    </div>

                    {{-- Button --}}
                    <button type="submit"
                        style="background-color: #ffffff; color: rgb(10, 61, 11);"
                        class="mt-4 w-full rounded-full px-6 py-3 text-sm font-semibold text-white
                               bg-gradient-to-b from-[#63cf55] to-[#40ad3f]
                               shadow-[0_10px_25px_rgba(71,182,73,0.3)]
                               transition-all duration-200
                               hover:-translate-y-[2px]
                               hover:shadow-[0_18px_35px_rgba(71,182,73,0.4)]">
                        Send Message
                    </button>

                </form>
            </div>
        </div>

    </div>
</section>

@endsection
