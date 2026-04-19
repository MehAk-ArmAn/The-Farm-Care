@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div class="rounded-[2rem] border border-[var(--border-soft)] bg-white/70 p-6 shadow-[var(--shadow-card)] backdrop-blur-xl">

        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[var(--brand-green)]">
            Newsletter Campaign
        </p>

        <h1 class="mt-3 text-3xl font-extrabold text-slate-900">
            Send Newsletter
        </h1>

        <p class="mt-3 text-slate-600">
            Broadcast email to all subscribers.
        </p>

    </div>

    <!-- FORM CARD -->
    <form method="POST"
          action="{{ route('admin.newsletter.send') }}"
          class="rounded-[2rem] border border-[var(--border-soft)] bg-white/70 p-6 shadow-[var(--shadow-card)] backdrop-blur-xl space-y-6">

        @csrf

        <!-- SUBJECT -->
        <div>
            <label class="block mb-2 text-sm font-semibold text-slate-700">
                Subject
            </label>

            <input type="text"
                   name="subject"
                   placeholder="Enter subject"
                   class="w-full rounded-full border border-slate-200 bg-white/80 px-5 py-4 focus:border-[var(--brand-green)] focus:ring-4 focus:ring-[var(--brand-green)]/10"
                   required>
        </div>

        <!-- MESSAGE -->
        <div>
            <label class="block mb-2 text-sm font-semibold text-slate-700">
                Message
            </label>

            <textarea name="message"
                      rows="10"
                      class="w-full rounded-2xl border border-slate-200 bg-white/80 px-5 py-4 focus:border-[var(--brand-green)] focus:ring-4 focus:ring-[var(--brand-green)]/10"
                      required></textarea>
        </div>

        <!-- BUTTON -->
        <div class="flex gap-3">

            <button type="submit"
                class="premium-btn premium-btn-green rounded-full px-7 py-4 text-sm font-semibold">
                Send Newsletter 🚀
            </button>

            <a href="{{ route('admin.newsletter.index') }}"
               class="premium-btn premium-btn-light rounded-full px-7 py-4 text-sm font-semibold">
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection
