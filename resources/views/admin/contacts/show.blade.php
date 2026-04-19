@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <div class="rounded-[2rem] border border-[var(--border-soft)] bg-white/70 p-6 shadow-[var(--shadow-card)] backdrop-blur-xl">
        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[var(--brand-green)]">
            Contact Details
        </p>
        <h1 class="mt-3 text-3xl font-extrabold text-slate-900">
            {{ $contact->name }}
        </h1>
        <p class="mt-3 text-slate-600">
            Submitted on {{ $contact->created_at->format('d M Y, h:i A') }}
        </p>
    </div>

    <div class="rounded-[2rem] border border-[var(--border-soft)] bg-white/70 p-6 shadow-[var(--shadow-card)] backdrop-blur-xl space-y-6">

        <div>
            <h3 class="text-sm font-semibold text-slate-500">Email</h3>
            <p class="mt-1 text-slate-900">{{ $contact->email }}</p>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-slate-500">Phone</h3>
            <p class="mt-1 text-slate-900">{{ $contact->phone ?: '-' }}</p>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-slate-500">Subject</h3>
            <p class="mt-1 text-slate-900">{{ $contact->subject ?: '-' }}</p>
        </div>

        <div>
            <h3 class="text-sm font-semibold text-slate-500">Message</h3>
            <div class="mt-2 rounded-2xl bg-white/70 p-5 text-slate-800 shadow-sm">
                {!! nl2br(e($contact->message)) !!}
            </div>
        </div>

        <div>
            <a href="{{ route('admin.contacts.index') }}"
               class="premium-btn premium-btn-light rounded-full px-6 py-3 text-sm font-semibold">
                Back to Messages
            </a>
        </div>

    </div>

</div>

@endsection
