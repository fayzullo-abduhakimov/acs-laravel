@props([
    'variant'    => 'header',
    'class'      => null,
    'imageClass' => 'logo_image_header',
    'alt'        => 'Logo',
    'href'       => null,
])

@php
    use App\Support\LocaleAssets;

    $logos = match ($variant) {
        'home'   => ['single' => LocaleAssets::homeLogo()],
        'footer' => LocaleAssets::footerLogos(),
        'acdf'   => LocaleAssets::acdfLogos(),
        default  => LocaleAssets::headerLogos(),
    };
@endphp

@if ($variant === 'home')
    <img {{ $attributes->class([$imageClass, $class]) }} src="{{ $logos['single'] }}" alt="{{ $alt }}">
@else
    @if ($href)
        <a href="{{ $href }}" {{ $attributes->only(['target', 'rel'])->class(['logo_link', $class]) }}>
            <img class="{{ $imageClass }} dark"  src="{{ $logos['dark'] }}"  alt="{{ $alt }}">
            <img class="{{ $imageClass }} light" src="{{ $logos['light'] }}" alt="{{ $alt }}">
        </a>
    @else
        <img class="{{ $imageClass }} dark"  src="{{ $logos['dark'] }}"  alt="{{ $alt }}">
        <img class="{{ $imageClass }} light" src="{{ $logos['light'] }}" alt="{{ $alt }}">
    @endif
@endif
