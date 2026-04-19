@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 pb-20">

    <!-- Header Section -->
    <section class="relative overflow-hidden bg-slate-950 pt-24 pb-12 text-strong">
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('images/banners/hero-2.jpg') }}" class="h-full w-full object-cover"> <!-- bg image -->
        </div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[var(--brand-green)]">Admin Portal</p>
                <h1 class="mt-2 text-4xl font-bold tracking-tight">Customer Inquiries</h1>
            </div>
        </div>
    </section>

    <!-- Table Section -->
    <section class="mt-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-8 rounded-2xl bg-green-50 p-4 text-sm font-semibold text-green-700 ring-1 ring-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if($inquiries->count())
                <div class="overflow-hidden rounded-[2rem] bg-white shadow-xl ring-1 ring-slate-200">

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">

                            <!-- Table Head -->
                            <thead class="bg-slate-100 text-slate-600 uppercase text-xs tracking-wider">
                                <tr>
                                    <th class="px-6 py-4 text-left">Name</th>
                                    <th class="px-6 py-4 text-left">Email</th>
                                    <th class="px-6 py-4 text-left">Product</th>
                                    <th class="px-6 py-4 text-left">Message</th>
                                    <th class="px-6 py-4 text-left">Date</th>
                                </tr>
                            </thead>

                            <!-- Table Body -->
                            <tbody class="divide-y divide-slate-100">
                                @foreach($inquiries as $inq)
                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-6 py-4 font-semibold text-slate-900">
                                        {{ $inq->name }}
                                    </td>

                                    <td class="px-6 py-4 text-slate-600">
                                        {{ $inq->email }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                                            {{ $inq->product_name }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-slate-500 max-w-xs truncate">
                                        {{ $inq->message }} <!-- cuts long msg -->
                                    </td>

                                    <td class="px-6 py-4 text-slate-400 text-xs">
                                        {{ $inq->created_at->format('d M Y H:i') }}
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            @else
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center rounded-[3rem] border-2 border-dashed border-slate-200 bg-white py-24 text-center">
                    <div class="rounded-full bg-slate-50 p-6 text-slate-300">
                        <svg class="h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.8L3 20l1.8-3.6A7.963 7.963 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-slate-900">No inquiries yet</h3>
                    <p class="mt-2 text-slate-500">When customers message you, they'll show up here.</p>
                </div>
            @endif

        </div>
    </section>

</div>
@endsection
