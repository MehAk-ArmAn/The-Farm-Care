@extends('admin.layout')
@section('title','Inquiries & Quotes')
@section('heading','Inquiries & Quotes')
@section('content')
<div class="admin-page-intro"><div><h2>Customer Requests</h2><p>Review, update status, add internal notes or permanently delete customer inquiries and quote requests.</p></div></div>
<div class="panel admin-list-panel">
    <div class="panel-head admin-filter-head">
        <form class="toolbar admin-filter-form" method="get">
            <select name="type"><option value="">All types</option><option value="inquiry" @selected(request('type')==='inquiry')>Inquiry</option><option value="quote" @selected(request('type')==='quote')>Quote</option></select>
            <select name="status"><option value="">All statuses</option>@foreach(['new','in_progress','answered','closed'] as $s)<option value="{{ $s }}" @selected(request('status')===$s)>{{ ucfirst(str_replace('_',' ',$s)) }}</option>@endforeach</select>
            <button class="btn btn-outline btn-sm">Apply Filters</button>
            @if(request()->filled('type') || request()->filled('status'))<a class="btn btn-plain btn-sm" href="{{ route('admin.inquiries.index') }}">Clear</a>@endif
        </form>
        <div class="admin-result-count">{{ $inquiries->total() }} requests</div>
    </div>
    <div class="table-wrap"><table class="table admin-data-table"><thead><tr><th>Request</th><th>Customer</th><th>Product</th><th>Status</th><th>Date</th><th class="actions-col">Actions</th></tr></thead><tbody>
    @forelse($inquiries as $i)
        <tr><td><strong>{{ ucfirst($i->type) }}</strong></td><td><strong>{{ $i->name }}</strong><div class="hint">{{ $i->email }}</div></td><td>{{ $i->product?->name ?: 'General request' }}</td><td><span class="badge">{{ ucfirst(str_replace('_',' ',$i->status)) }}</span></td><td>{{ $i->created_at->format('d M Y') }}</td><td><div class="actions admin-row-actions"><a class="btn btn-outline btn-sm" href="{{ route('admin.inquiries.show',$i) }}">Open / Edit</a><form method="post" action="{{ route('admin.inquiries.destroy',$i) }}" onsubmit="return confirm('Permanently delete this customer request?')">@csrf @method('DELETE')<button class="btn btn-danger btn-sm">Delete</button></form></div></td></tr>
    @empty<tr><td colspan="6"><div class="admin-empty"><strong>No requests found.</strong></div></td></tr>@endforelse
    </tbody></table></div>
    {{ $inquiries->links('components.pagination') }}
</div>
@endsection
