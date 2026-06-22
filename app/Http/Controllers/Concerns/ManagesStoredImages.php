<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ManagesStoredImages
{
    protected function storePublicImage(UploadedFile $file, string $directory): string
    {
        return $file->store($directory, 'public');
    }

    protected function deletePublicImage(?string $path, string $directory): void
    {
        if (! $path) {
            return;
        }

        $normalizedPath = ltrim(str_replace('\\', '/', $path), '/');
        $storagePath = str_contains($normalizedPath, '/')
            ? $normalizedPath
            : $directory.'/'.basename($normalizedPath);
        $legacyStoragePath = $directory.'/'.basename($normalizedPath);
        $candidates = array_values(array_filter(
            array_unique([$storagePath, $legacyStoragePath]),
            fn (string $candidate): bool => $candidate !== ''
        ));

        if ($candidates === []) {
            return;
        }

        $disk = Storage::disk('public');
        $disk->delete($candidates);

        foreach ($candidates as $candidate) {
            $absolutePath = $disk->path($candidate);

            if (is_file($absolutePath)) {
                @unlink($absolutePath);
            }
        }
    }
}
