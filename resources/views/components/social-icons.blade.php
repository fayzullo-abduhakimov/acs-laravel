@props([
    'links'    => [],
    'iconSize' => 'fa-2x',
])

@foreach ($links as $link)
    <a {{ $attributes->class(['social_link']) }}
       href="{{ $link->link }}"
       title="{{ $link->name }}"
       aria-label="{{ $link->name }}"
       target="_blank"
       rel="noopener">
        <i class="{{ $link->class }} {{ $iconSize }}"></i>
    </a>
@endforeach
