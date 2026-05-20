@props([
    'path'     => null,
    'alt'      => '',
    'fallback' => 'images/no_image.png',
])

{{-- Renders an <img> from a storage path with a graceful fallback. --}}
<img {{ $attributes }}
     src="{{ $path ? asset('storage/' . ltrim($path, '/')) : asset($fallback) }}"
     alt="{{ $alt }}">
