@extends('admin.layout')
@section('title','Dashboard')
@section('heading','Dashboard')
@section('content')
<div class="admin-page-intro dashboard-intro">
    <div><h2>Website Overview</h2><p>Manage the full The Farm Care website from one place: catalog, customer requests, public content, media and global settings.</p></div>
    <div class="admin-quick-actions"><a class="btn btn-primary" href="{{ route('admin.products.create') }}">+ Add Product</a><a class="btn btn-outline" href="{{ route('admin.pages.index') }}">Edit Website Content</a></div>
</div>
<div class="cards">
    <a class="kpi" href="{{ route('admin.categories.index') }}"><span>Categories</span><strong>{{ $categoryCount }}</strong><small>Manage product groups →</small></a>
    <a class="kpi" href="{{ route('admin.products.index') }}"><span>Products</span><strong>{{ $productCount }}</strong><small>Edit catalog →</small></a>
    <a class="kpi" href="{{ route('admin.inquiries.index',['status'=>'new']) }}"><span>New Requests</span><strong>{{ $newInquiryCount }}</strong><small>Review requests →</small></a>
    <a class="kpi" href="{{ route('admin.inquiries.index',['type'=>'quote']) }}"><span>Total Quotes</span><strong>{{ $quoteCount }}</strong><small>View quotations →</small></a>
</div>
<div class="admin-dashboard-grid">
    <div class="panel">
        <div class="panel-head"><div><h2>Latest Inquiries & Quotes</h2><p class="panel-subtitle">Newest customer activity</p></div><a class="btn btn-outline btn-sm" href="{{ route('admin.inquiries.index') }}">View all</a></div>
        <div class="table-wrap"><table class="table admin-data-table"><thead><tr><th>Type</th><th>Customer</th><th>Status</th><th>Date</th></tr></thead><tbody>@forelse($latest as $i)<tr><td>{{ ucfirst($i->type) }}</td><td><a href="{{ route('admin.inquiries.show',$i) }}"><strong>{{ $i->name }}</strong></a><div class="hint">{{ $i->email }}</div></td><td><span class="badge">{{ str_replace('_',' ',$i->status) }}</span></td><td>{{ $i->created_at->format('d M Y H:i') }}</td></tr>@empty<tr><td colspan="4"><div class="admin-empty"><strong>No customer requests yet.</strong></div></td></tr>@endforelse</tbody></table></div>
    </div>
    <div class="panel quick-panel">
        <div class="panel-head"><div><h2>Quick Management</h2><p class="panel-subtitle">Most-used CMS areas</p></div></div>
        <div class="quick-link-grid">
            <a href="{{ route('admin.products.index') }}"><strong>Products</strong><span>Edit, duplicate or delete catalog items.</span></a>
            <a href="{{ route('admin.categories.index') }}"><strong>Categories</strong><span>Manage names, images and ordering.</span></a>
            <a href="{{ route('admin.pages.index') }}"><strong>Website Pages</strong><span>Edit customer-facing page content.</span></a>
            <a href="{{ route('admin.settings.edit') }}"><strong>Global Settings</strong><span>Header, footer, contact details and labels.</span></a>
            <a href="{{ route('admin.media.index') }}"><strong>Media Library</strong><span>Upload and delete website images.</span></a>
            <a href="{{ route('admin.profile') }}"><strong>Admin Profile</strong><span>Update login email and password.</span></a>
        </div>
    </div>
</div>
@endsection
