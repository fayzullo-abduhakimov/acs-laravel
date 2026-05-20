@props([
    'section'        => null,
    'totalMenuWidth' => 0,
    'extraClass'     => '',
    'redirectUrl'    => null,
])

@php
    $isOpened   = (bool) ($section?->is_opened);
    $widthStyle = $isOpened ? "width: calc(100% - {$totalMenuWidth}px);" : null;
@endphp

<section
    data-width="{{ $totalMenuWidth }}"
    @if ($redirectUrl) data-redirect="{{ $redirectUrl }}" @endif
    {{ $attributes->class([
        'menu_bar',
        $extraClass,
        'opened' => $isOpened,
    ]) }}
    @if ($widthStyle) style="{{ $widthStyle }}" @endif
>
    {{ $slot }}
</section>
