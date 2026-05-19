@props(['footer_settings', 'social_links', 'footer_menus'])

@php
    $locale = app()->getLocale();
    $logoMap = [
        'ru' => [
            'dark' => '/images/aral_logo/dark/logo_footer_new_ru.svg',
            'light' => '/images/aral_logo/light/logo_footer_new_ru.svg',
        ],
        'uz' => [
            'dark' => '/images/aral_logo/dark/logo_footer_new_uz.svg',
            'light' => '/images/aral_logo/light/logo_footer_new_uz.svg',
        ],
        'kk' => [
            'dark' => '/images/aral_logo/dark/logo_footer_new_ka.svg',
            'light' => '/images/aral_logo/light/logo_footer_new_ka.svg',
        ],
        'en' => [
            'dark' => '/images/aral_logo/dark/logo_footer_new_en.svg',
            'light' => '/images/aral_logo/light/logo_footer_new_en.svg',
        ],
    ];
    $acdfMap = [
        'ru' => ['dark' => '/images/acdf_logo/dark/logo-ru.svg', 'light' => '/images/acdf_logo/light/logo-ru.svg'],
        'uz' => ['dark' => '/images/acdf_logo/dark/logo-uz.svg', 'light' => '/images/acdf_logo/light/logo-uz.svg'],
        'en' => ['dark' => '/images/acdf_logo/dark/logo-en.svg', 'light' => '/images/acdf_logo/light/logo-en.svg'],
    ];
    $logos = $logoMap[$locale] ?? $logoMap['en'];
    $acdf_logos = $acdfMap[$locale] ?? $acdfMap['en'];
@endphp

<footer class="footer">
    <div class="container-fluid">
        <div class="d-flex align-items-start footer_row">

            <div class="footer_col">
                <div class="footer_logo">
                    <a class="d-block footer_logo" href="{{ route('home') }}">
                        <img src="{{ $logos['dark'] }}" alt="logo" class="logo_image_footer dark">
                        <img src="{{ $logos['light'] }}" alt="logo" class="logo_image_footer light">
                    </a>
                </div>
            </div>

            <div class="footer_col">
                <div class="contacts">
                    <p class="section_title">{{ translator('app', 'Contacts') }}</p>
                    <p>{{ $footer_settings->get('acdf') }}</p>
                    <p>{{ $footer_settings->get('acdf_address') }}</p>
                </div>
                <div class="general_inquiries mt-3">
                    <p class="section_title m-0">{{ translator('app', 'General inquiries') }}</p>
                    <p class="m-0">
                        <a
                            href="mailto:{{ $footer_settings->get('acdf_email') }}">{{ $footer_settings->get('acdf_email') }}</a>
                    </p>
                </div>
                <div class="social-media mt-3">
                    <p class="section_title">{{ translator('app', 'Social media') }}</p>
                    @foreach ($social_links as $link)
                        <a href="{{ $link->link }}" target="_blank" aria-label="{{ $link->name }}">
                            <i class="{{ $link->class }} fa-2x"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="footer_col">
                <div class="organisers">
                    <p class="section_title m-0">{{ translator('app', 'Organiser') }}</p>
                    <p>{{ $footer_settings->get('acdf') }}</p>
                    <a class="d-block mt-4 acdf_logo" href="https://acdf.uz/" target="_blank">
                        <img src="{{ $acdf_logos['light'] }}" alt="logo" class="logo_image_footer light">
                        <img src="{{ $acdf_logos['dark'] }}" alt="logo" class="logo_image_footer dark">
                    </a>
                </div>
                <div class="policies mobile mt-4 pt-3">
                    @foreach ($footer_menus as $menu)
                        <a href="{{ $menu->link }}" class="me-3">{{ $menu->title }}</a>
                    @endforeach
                </div>
            </div>

            <div class="footer_col">
                <div class="subscribe_wrap">
                    <p class="section_title mb-2">{{ translator('app', 'Newsletter') }}</p>
                    <form action="{{ route('subscribe') }}" method="POST" class="validate">
                        @csrf
                        <div class="subscribe_form d-flex">
                            <div class="w-100 field-subscribers-email required">
                                <input type="email" name="email" placeholder="Email" required class="required email w-100">
                                <div class="invalid-feedback"></div>
                            </div>
                            <input type="submit" class="btn-white" value="{{ translator('app', 'Subscribe') }}">
                        </div>
                        @if (session('success'))
                            <p class="text-success mt-2">{{ session('success') }}</p>
                        @endif
                    </form>
                    <div class="policies mt-4 pt-3">
                        @foreach ($footer_menus as $menu)
                            <a href="{{ $menu->link }}" class="me-3">{{ $menu->title }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
