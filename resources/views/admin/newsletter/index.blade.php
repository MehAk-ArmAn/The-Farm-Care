@extends('layouts.admin')

@section('content')

<div>

    <!-- HEADER -->
    <div class="rounded-[2rem] bg-white/70 p-6 shadow backdrop-blur">
        <h1 class="text-3xl font-bold text-slate-900">Newsletter Subscribers</h1>
        <p class="mt-2 text-slate-600">All collected emails</p>
    </div>

    <!-- STATS -->
    <div class="mt-6 grid gap-6 md:grid-cols-3">

        <div class="bg-white/60 p-6 rounded-2xl shadow">
            <p>Total</p>
            <h2 class="text-3xl font-bold">{{ $subscribers->total() }}</h2>
        </div>

        <div class="bg-white/60 p-6 rounded-2xl shadow">
            <p>Active</p>
            <h2 class="text-3xl font-bold text-green-600">
                {{ \App\Models\NewsletterSubscriber::where('is_active', true)->count() }}
            </h2>
        </div>

        <div class="bg-white/60 p-6 rounded-2xl shadow">
            <p>Latest</p>
            <h2 class="text-sm font-bold break-all">
                {{ optional(\App\Models\NewsletterSubscriber::latest()->first())->email }}
            </h2>
        </div>

    </div>

    <!-- TABLE -->
    <div class="mt-8 bg-white/70 rounded-2xl shadow overflow-hidden">

        <div class="p-6 border-b">
            <h2 class="font-semibold">Subscribers</h2>
        </div>

        <table class="w-full text-sm">
            <thead class="bg-slate-100">
                <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($subscribers as $s)
                    <tr class="border-b hover:bg-white/50">
                        <td class="p-3">{{ $s->id }}</td>
                        <td class="p-3">{{ $s->email }}</td>
                        <td class="p-3">
                            @if($s->is_active)
                                <span class="text-green-600">Active</span>
                            @else
                                <span class="text-red-500">Inactive</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@endsection
