@props([
    'section'        => null,
    'totalMenuWidth' => 0,
    'extraClass'     => '',
    'redirectUrl'    => null,
])

@php
    // Redirect sections (e.g. aral_school) are always rendered as closed tab strips —
    // the original template never applied is_opened logic to them.
    $isOpened   = $redirectUrl ? false : (bool) ($section?->is_opened);
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
