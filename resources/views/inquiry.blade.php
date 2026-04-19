@extends('layouts.app')

@section('content')
<section class="bg-white py-20">
    <div class="mx-auto max-w-3xl px-4">

        {{-- 🔥 Page Title --}}
        <h1 class="text-3xl font-bold text-slate-900">Send Inquiry</h1>
        <p class="mt-2 text-slate-600">Fill the form below and we’ll get back to you ASAP.</p>

        {{-- ✅ Success message --}}
        @if(session('success'))
            <div class="mt-4 rounded-lg bg-green-50 p-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        {{-- 🔥 Add Product to Inquiry Cart --}}
        <form action="{{ route('inquiry.add') }}" method="POST" class="mt-8 flex gap-2">
            @csrf
            <input type="text" name="product_name" value="{{ request('product') }}"
                   class="rounded-xl border p-2 flex-1" placeholder="Product name">
            <input type="number" name="quantity" value="1" min="1"
                   class="rounded-xl border p-2 w-24" placeholder="Qty">
            <button type="submit" class="bg-[var(--brand-green)] text-strong px-4 rounded-full">
                Add Product
            </button>
        </form>

        {{-- 🛒 Display Products in Inquiry Cart --}}
        @if(session('inquiry_cart') && count(session('inquiry_cart')) > 0)
            <h3 class="mt-6 font-semibold text-slate-900">Products in Inquiry:</h3>
            <ul class="mt-2 space-y-2">
                @foreach(session('inquiry_cart') as $index => $item)
                    <li class="flex justify-between items-center bg-slate-100 p-2 rounded-xl">
                        <div>
                            <span class="font-medium">{{ $item['product_name'] }}</span>
                            <span class="ml-2 text-sm text-slate-600">Qty: {{ $item['quantity'] }}</span>
                        </div>

                        <div class="flex gap-2">
                            {{-- Edit quantity form --}}
                            <form action="{{ route('inquiry.edit', $index) }}" method="POST" class="flex items-center gap-1">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                    class="w-16 rounded-xl border p-1 text-center text-sm">
                                <button type="submit"
                                        class="bg-[var(--brand-green)] text-strong px-3 py-1 rounded-full text-sm hover:opacity-90">
                                    Edit
                                </button>
                            </form>

                            {{-- Delete product --}}
                            <form action="{{ route('inquiry.delete', $index) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-strong px-3 py-1 rounded-full text-sm hover:opacity-90">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- 🔥 Full Inquiry Form --}}
        <form action="{{ route('inquiry.store') }}" method="POST" class="mt-6 space-y-6">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-sm font-semibold text-slate-900">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3" placeholder="Your full name">
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-semibold text-slate-900">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3" placeholder="Your email">
            </div>

            {{-- Phone --}}
            <div>
                <label class="block text-sm font-semibold text-slate-900">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3" placeholder="Optional">
            </div>

            {{-- Company --}}
            <div>
                <label class="block text-sm font-semibold text-slate-900">Company</label>
                <input type="text" name="company" value="{{ old('company') }}"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3" placeholder="Optional">
            </div>

            {{-- Country --}}
            <div>
                <label class="block text-sm font-semibold text-slate-900">Country</label>
                <input type="text" name="country" value="{{ old('country') }}"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3" placeholder="Optional">
            </div>

            {{-- Subject --}}
            <div>
                <label class="block text-sm font-semibold text-slate-900">Subject</label>
                <input type="text" name="subject" value="{{ old('subject') }}"
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3" placeholder="Optional">
            </div>

            {{-- Message --}}
            <div>
                <label class="block text-sm font-semibold text-slate-900">Message</label>
                <textarea name="message" rows="4" required
                    class="mt-2 w-full rounded-xl border border-slate-300 p-3"
                    placeholder="Your message"></textarea>
            </div>

            {{-- Submit Inquiry for All Products --}}
            <button type="submit"
                class="w-full rounded-full bg-[var(--brand-green)] px-6 py-3 font-semibold text-strong hover:opacity-90">
                Send Inquiry for All Products
            </button>
        </form>

    </div>
</section>
@endsection
