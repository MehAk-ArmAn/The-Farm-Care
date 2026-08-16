<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class MediaUrl
{
    public static function make(?string $path, string $fallback = 'assets/images/logo.png'): string
    {
        if (blank($path)) return asset($fallback);

        $path = str_replace('\\', '/', trim($path));
        if (preg_match('#^https?://#i', $path)) return $path;

        $path = ltrim($path, '/');

        if (str_starts_with($path, 'seed/') || str_starts_with($path, 'catalog/')) {
            $bundledPath = 'assets/images/builtin/'.$path;
            if (is_file(public_path($bundledPath))) return asset($bundledPath);
        }

        if (str_starts_with($path, 'assets/') && is_file(public_path($path))) return asset($path);
        if (is_file(public_path($path))) return asset($path);
        if (Storage::disk('public')->exists($path)) return Storage::disk('public')->url($path);

        return asset($fallback);
    }

    public static function exists(?string $path): bool
    {
        if (blank($path)) return false;

        $path = str_replace('\\', '/', trim($path));
        if (preg_match('#^https?://#i', $path)) return true;
        $path = ltrim($path, '/');

        if (str_starts_with($path, 'seed/') || str_starts_with($path, 'catalog/')) {
            if (is_file(public_path('assets/images/builtin/'.$path))) return true;
        }

        if (str_starts_with($path, 'assets/') && is_file(public_path($path))) return true;
        if (is_file(public_path($path))) return true;

        return Storage::disk('public')->exists($path);
    }
}
