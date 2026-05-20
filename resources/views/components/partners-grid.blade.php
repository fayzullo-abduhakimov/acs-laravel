@props([
    'partners' => null,
    'title'    => null,
    'class'    => '',
])

@if ($partners && $partners->galleryItems->isNotEmpty())
    <div {{ $attributes->class(['partners', $class]) }}>
        @if ($title)
            <div class="partners_title">{{ $title }}</div>
        @endif
        <div class="partners_logo">
            @foreach ($partners->galleryItems as $partner)
                <div class="partner_logo">
                    <x-storage-image :path="$partner->image" alt="partner" fallback="" />
                </div>
            @endforeach
        </div>
        {{ $slot }}
    </div>
@endif
