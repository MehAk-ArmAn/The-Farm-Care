@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    <div class="rounded-[2rem] border border-[var(--border-soft)] bg-white/70 p-6 shadow-[var(--shadow-card)] backdrop-blur-xl">
        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-[var(--brand-green)]">
            Contact Messages
        </p>
        <h1 class="mt-3 text-3xl font-extrabold text-slate-900">
            Website Contacts
        </h1>
        <p class="mt-3 text-slate-600">
            View all submitted messages from the contact form.
        </p>
    </div>

    <div class="overflow-hidden rounded-[2rem] border border-[var(--border-soft)] bg-white/70 shadow-[var(--shadow-card)] backdrop-blur-xl">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50/80">
                    <tr>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Subject</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Date</th>
                        <th class="px-6 py-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($contacts as $contact)
                        <tr class="hover:bg-white/60">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $contact->name }}</td>
                            <td class="px-6 py-4 text-slate-700">{{ $contact->email }}</td>
                            <td class="px-6 py-4 text-slate-700">{{ $contact->subject ?: '-' }}</td>
                            <td class="px-6 py-4">
                                @if($contact->is_read)
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">Read</span>
                                @else
                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">New</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-slate-500">{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                   class="premium-btn premium-btn-green rounded-full px-4 py-2 text-xs font-semibold">
                                    Open
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                No contact messages yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-slate-200 px-6 py-4">
            {{ $contacts->links() }}
        </div>
    </div>

</div>

@endsection
