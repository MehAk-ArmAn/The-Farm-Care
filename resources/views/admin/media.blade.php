@extends('admin.layout')
@section('title','Media Library')
@section('heading','Media Library')
@section('back_url', route('admin.dashboard'))
@section('back_label','Dashboard')

@section('content')
<div class="admin-page-intro">
    <div>
        <h2>Media Library</h2>
        <p>Upload and manage website photography. Product galleries should use genuine product photographs only; generated application drawings are excluded from this library.</p>
    </div>
</div>

<div class="panel media-upload-panel">
    <div class="panel-head media-upload-head">
        <div>
            <h2>Upload Images</h2>
            <p class="panel-subtitle">JPG, PNG, WEBP or GIF. Maximum 8 MB per file.</p>
        </div>
    </div>
    <form class="media-upload-form" method="post" enctype="multipart/form-data" action="{{ route('admin.media.store') }}">
        @csrf
        <label class="media-dropzone">
            <span class="media-drop-icon">@include('admin.partials.icon',['name'=>'upload'])</span>
            <strong>Select product or website photos</strong>
            <span>Choose one or multiple image files from your computer.</span>
            <input type="file" name="files[]" multiple accept="image/*" required>
        </label>
        <button class="btn btn-primary" type="submit"><span class="btn-icon">@include('admin.partials.icon',['name'=>'upload'])</span>Upload Selected Images</button>
    </form>
</div>

<div class="panel media-library-panel">
    <div class="panel-head media-library-head">
        <div>
            <h2>Stored Media</h2>
            <p class="panel-subtitle">{{ count($files) }} image{{ count($files) === 1 ? '' : 's' }} shown</p>
        </div>
        <form class="toolbar media-search-form" method="get">
            <input type="search" name="q" value="{{ $query }}" placeholder="Search media path…" aria-label="Search media">
            <button class="btn btn-outline btn-sm" type="submit">Search</button>
            @if($query !== '')<a class="btn btn-plain btn-sm" href="{{ route('admin.media.index') }}">Clear</a>@endif
        </form>
    </div>

    @if(count($files))
        <div class="media-grid media-grid-v16">
            @foreach($files as $file)
                <article class="media-card media-card-v16">
                    <a class="media-preview-link" href="{{ $file['preview_url'] }}" target="_blank" rel="noopener" aria-label="Open image preview">
                        <img src="{{ $file['preview_url'] }}" alt="{{ basename($file['path']) }}" loading="lazy">
                        <span class="media-preview-overlay"><span class="btn-icon">@include('admin.partials.icon',['name'=>'eye'])</span>Preview</span>
                    </a>
                    <div class="media-card-body">
                        <strong class="media-filename">{{ basename($file['path']) }}</strong>
                        <div class="media-path">{{ $file['path'] }}</div>
                        <div class="media-meta">{{ number_format($file['size']/1024,1) }} KB</div>
                    </div>
                    <form method="post" action="{{ route('admin.media.destroy') }}" onsubmit="return confirm('Delete this media file permanently?')">
                        @csrf @method('DELETE')
                        <input type="hidden" name="path" value="{{ $file['path'] }}">
                        <button class="btn btn-danger btn-sm media-delete-btn" type="submit"><span class="btn-icon">@include('admin.partials.icon',['name'=>'trash'])</span>Delete</button>
                    </form>
                </article>
            @endforeach
        </div>
    @else
        <div class="admin-empty"><strong>No images found.</strong><span>{{ $query !== '' ? 'Try a different search.' : 'Upload your first image above.' }}</span></div>
    @endif
</div>
@endsection
