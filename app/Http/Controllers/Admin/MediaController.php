<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = trim((string) $request->query('q', ''));

        $files = collect(Storage::disk('public')->allFiles())
            ->filter(fn ($file) => preg_match('/\.(png|jpe?g|webp|gif)$/i', $file))
            ->reject(fn ($file) => Str::endsWith(Str::lower($file), '/usage.jpg'))
            ->filter(fn ($file) => $query === '' || Str::contains(Str::lower($file), Str::lower($query)))
            ->map(fn ($file) => [
                'path' => $file,
                'preview_url' => route('admin.media.preview', ['path' => $file]),
                'size' => Storage::disk('public')->size($file),
                'modified' => Storage::disk('public')->lastModified($file),
            ])
            ->sortByDesc('modified')
            ->values();

        return view('admin.media', compact('files', 'query'));
    }

    public function preview(Request $request)
    {
        $path = (string) $request->query('path', '');
        abort_if($path === '' || str_contains($path, '..'), 400);
        abort_unless(preg_match('/\.(png|jpe?g|webp|gif)$/i', $path), 404);
        abort_unless(Storage::disk('public')->exists($path), 404);

        $absolutePath = Storage::disk('public')->path($path);
        $mime = Storage::disk('public')->mimeType($path) ?: 'application/octet-stream';

        return response()->file($absolutePath, [
            'Content-Type' => $mime,
            'Cache-Control' => 'private, max-age=300',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'image|max:8192',
        ]);

        foreach ($request->file('files', []) as $file) {
            $file->store('media', 'public');
        }

        return back()->with('success', 'Media uploaded successfully.');
    }

    public function destroy(Request $request)
    {
        $request->validate(['path' => 'required|string']);
        $path = (string) $request->path;
        abort_if(str_contains($path, '..'), 400);

        Storage::disk('public')->delete($path);

        return back()->with('success', 'Media deleted.');
    }
}
