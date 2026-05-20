<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Adds an `image_url` accessor that resolves the `image` storage path
 * to a public URL, falling back to a placeholder when empty.
 *
 * Models can override `imageFallback()` to use a different placeholder.
 */
trait HasStorageImage
{
    protected function imageUrl(): Attribute
    {
        return Attribute::get(function (): string {
            $path = $this->attributes['image'] ?? null;

            if ($path) {
                return asset('storage/' . ltrim($path, '/'));
            }

            $fallback = $this->imageFallback();

            return $fallback === '' ? '' : asset($fallback);
        })->shouldCache();
    }

    protected function imageFallback(): string
    {
        return 'images/no_image.png';
    }
}
