@extends('admin.layout')
@section('title','Categories')
@section('heading','Categories')
@section('content')
<div class="admin-page-intro">
    <div><h2>Product Categories</h2><p>Manage category names, descriptions, images, ordering, visibility and SEO. Categories containing products must be emptied before deletion.</p></div>
    <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">+ Add Category</a>
</div>
<div class="panel admin-list-panel">
    <div class="table-wrap">
        <table class="table admin-data-table">
            <thead><tr><th>Category</th><th>Products</th><th>Order</th><th>Visibility</th><th class="actions-col">Actions</th></tr></thead>
            <tbody>
            @foreach($categories as $c)
                <tr>
                    <td><div class="admin-entity-cell"><img class="thumb thumb-lg" src="{{ \App\Support\MediaUrl::make($c->image) }}" alt="{{ $c->name }}"><div><strong>{{ $c->name }}</strong><span>/{{ $c->slug }}</span></div></div></td>
                    <td><strong>{{ $c->products_count }}</strong></td>
                    <td>{{ $c->sort_order }}</td>
                    <td><span class="badge {{ !$c->is_active?'gray':'' }}">{{ $c->is_active?'Published':'Hidden' }}</span></td>
                    <td><div class="actions admin-row-actions">
                        <a class="btn btn-plain btn-sm" href="{{ route('products.index',['category'=>$c->slug]) }}" target="_blank" rel="noopener">View</a>
                        <a class="btn btn-outline btn-sm" href="{{ route('admin.categories.edit',$c) }}">Edit</a>
                        <form method="post" action="{{ route('admin.categories.duplicate',$c) }}">@csrf<button class="btn btn-soft btn-sm" type="submit">Duplicate</button></form>
                        <form method="post" action="{{ route('admin.categories.destroy',$c) }}" onsubmit="return confirm('Delete this category? It can only be deleted when it contains no products.')">@csrf @method('DELETE')<button class="btn btn-danger btn-sm" type="submit">Delete</button></form>
                    </div></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
