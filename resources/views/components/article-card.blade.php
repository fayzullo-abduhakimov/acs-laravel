@props([
    'article',
    'locale' => null,
])

@php
    $locale     = $locale ?: app()->getLocale();
    $dateFormat = $locale === 'uz' ? 'd.m.Y' : 'F d, Y';
@endphp

<div class="article">
    <div class="article_image">
        <x-storage-image :path="$article->image" :alt="$article->title" />
    </div>
    <div class="article_date">
        {{ $article->published_date?->locale(carbon_locale($locale))->translatedFormat($dateFormat) }}
    </div>
    <div class="article_title">{{ $article->title }}</div>
    <button type="button" class="article_link" data-id="{{ $article->id }}">
        {{ translator('app', 'Read article') }}
    </button>
</div>
