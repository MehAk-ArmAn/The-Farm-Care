@extends('admin.layout')
@section('title','Products')
@section('heading','Products')
@section('content')
<div class="admin-page-intro">
    <div><h2>Product Catalog</h2><p>Create, edit, duplicate, publish, hide or delete products and manage every product image, gallery, specification and SEO field.</p></div>
    <a class="btn btn-primary" href="{{ route('admin.products.create') }}">+ Add Product</a>
</div>

<div class="panel admin-list-panel">
    <div class="panel-head admin-filter-head">
        <form class="toolbar admin-filter-form" method="get">
            <input name="q" value="{{ request('q') }}" placeholder="Search product name…">
            <select name="category"><option value="">All categories</option>@foreach($categories as $c)<option value="{{ $c->id }}" @selected(request('category')==$c->id)>{{ $c->name }}</option>@endforeach</select>
            <button class="btn btn-outline btn-sm">Apply Filters</button>
            @if(request()->filled('q') || request()->filled('category'))<a class="btn btn-plain btn-sm" href="{{ route('admin.products.index') }}">Clear</a>@endif
        </form>
        <div class="admin-result-count">{{ $products->total() }} products</div>
    </div>

    <div class="table-wrap">
        <table class="table admin-data-table">
            <thead><tr><th>Product</th><th>Category</th><th>Visibility</th><th>Featured</th><th class="actions-col">Actions</th></tr></thead>
            <tbody>
            @forelse($products as $p)
                <tr>
                    <td>
                        <div class="admin-entity-cell">
                            <img class="thumb thumb-lg" src="{{ \App\Support\MediaUrl::make($p->image) }}" alt="{{ $p->name }}">
                            <div><strong>{{ $p->name }}</strong><span>{{ $p->sku ?: '/'.$p->slug }}</span></div>
                        </div>
                    </td>
                    <td>{{ $p->category?->name ?: 'Unassigned' }}</td>
                    <td><span class="badge {{ !$p->is_active?'gray':'' }}">{{ $p->is_active?'Published':'Hidden' }}</span></td>
                    <td>{{ $p->is_featured ? 'Yes' : 'No' }}</td>
                    <td>
                        <div class="actions admin-row-actions">
                            <a class="btn btn-plain btn-sm" href="{{ route('products.show',$p->slug) }}" target="_blank" rel="noopener">View</a>
                            <a class="btn btn-outline btn-sm" href="{{ route('admin.products.edit',$p) }}">Edit</a>
                            <form method="post" action="{{ route('admin.products.duplicate',$p) }}">@csrf<button class="btn btn-soft btn-sm" type="submit">Duplicate</button></form>
                            <form method="post" action="{{ route('admin.products.destroy',$p) }}" onsubmit="return confirm('Permanently delete {{ addslashes($p->name) }}? This cannot be undone.')">@csrf @method('DELETE')<button class="btn btn-danger btn-sm" type="submit">Delete</button></form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5"><div class="admin-empty"><strong>No products found.</strong><span>Change the filters or add a new product.</span></div></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $products->links('components.pagination') }}
</div>
@endsection
