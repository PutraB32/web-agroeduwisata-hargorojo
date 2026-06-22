<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Storage;

trait ResolvesMediaUrl
{
    protected function resolveImageUrl(?string $filename, string $directory, ?string $fallback = null): string
    {
        $fallback ??= asset('images/beranda.bg.jpeg');

        if (blank($filename)) {
            return $fallback;
        }

        $normalizedPath = ltrim(str_replace('\\', '/', $filename), '/');
        $storagePath = str_contains($normalizedPath, '/')
            ? $normalizedPath
            : $directory.'/'.$normalizedPath;

        if (Storage::disk('public')->exists($storagePath)) {
            return asset('storage/'.$storagePath);
        }

        $legacyFilename = basename($normalizedPath);
        if (file_exists(public_path('images/'.$directory.'/'.$legacyFilename))) {
            return asset('images/'.$directory.'/'.$legacyFilename);
        }

        return asset('images/'.$normalizedPath);
    }
}
