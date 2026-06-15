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

        if (Storage::disk('public')->exists($directory.'/'.$filename)) {
            return asset('storage/'.$directory.'/'.$filename);
        }

        if (file_exists(public_path('images/'.$directory.'/'.$filename))) {
            return asset('images/'.$directory.'/'.$filename);
        }

        return asset('images/'.$filename);
    }
}
