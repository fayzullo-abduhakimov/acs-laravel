@php
    $locale = app()->getLocale();
    $logoMap = [
        'ru' => ['dark' => '/images/logo_header/dark/logo_header_new_ru.svg', 'light' => '/images/logo_header/light/logo_header_new_ru.svg'],
        'uz' => ['dark' => '/images/logo_header/dark/logo_header_new_uz.svg', 'light' => '/images/logo_header/light/logo_header_new_uz.svg'],
        'kk' => ['dark' => '/images/logo_header/dark/logo_header_new_ka.svg', 'light' => '/images/logo_header/light/logo_header_new_ka.svg'],
        'en' => ['dark' => '/images/logo_header/dark/logo_header_new_en.svg', 'light' => '/images/logo_header/light/logo_header_new_en.svg'],
    ];
    $sectionLogos = $logoMap[$locale] ?? $logoMap['en'];
@endphp
<div class="section_logo">
    <a href="{{ route('home') }}" class="logo_link">
        <img class="logo_image_header dark" src="{{ $sectionLogos['dark'] }}" alt="Logo">
        <img class="logo_image_header light" src="{{ $sectionLogos['light'] }}" alt="Logo">
    </a>
</div>
