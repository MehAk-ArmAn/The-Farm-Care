@extends('admin.layout')
@section('title','Website Pages')
@section('heading','Website Pages')
@section('content')
<div class="admin-page-intro">
    <div><h2>Editable Website Pages</h2><p>Edit the customer-facing content and SEO for every core website page. You can also remove a CMS record; the public route will continue with safe fallback content until it is seeded again.</p></div>
</div>
<div class="panel admin-list-panel">
    <div class="table-wrap">
        <table class="table admin-data-table">
            <thead><tr><th>Page</th><th>Main Heading</th><th>Visibility</th><th class="actions-col">Actions</th></tr></thead>
            <tbody>
            @foreach($pages as $p)
                @php
                    $publicUrl = match($p->key) {
                        'home' => route('home'),
                        'products' => route('products.index'),
                        'about' => route('about'),
                        'contact' => route('contact'),
                        'inquiry' => route('inquiry'),
                        'quote' => route('quote'),
                        default => null,
                    };
                @endphp
                <tr>
                    <td><strong>{{ $p->title }}</strong><div class="hint">CMS key: {{ $p->key }}</div></td>
                    <td>{{ $p->heading ?: '—' }}</td>
                    <td><span class="badge {{ !$p->is_active?'gray':'' }}">{{ $p->is_active?'Published':'Hidden' }}</span></td>
                    <td><div class="actions admin-row-actions">
                        @if($publicUrl)<a class="btn btn-plain btn-sm" href="{{ $publicUrl }}" target="_blank" rel="noopener">View</a>@endif
                        <a class="btn btn-outline btn-sm" href="{{ route('admin.pages.edit',$p) }}">Edit Content</a>
                        <form method="post" action="{{ route('admin.pages.destroy',$p) }}" onsubmit="return confirm('Delete the CMS record for {{ addslashes($p->title) }}? The route will fall back to safe default content until the record is seeded again.')">@csrf @method('DELETE')<button class="btn btn-danger btn-sm" type="submit">Delete</button></form>
                    </div></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
