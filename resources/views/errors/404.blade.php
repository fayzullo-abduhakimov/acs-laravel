@php
    use App\Models\Menu;
    use App\Models\SiteSettings;
    use App\Models\SocialLink;
    use App\Support\LocaleAssets;

    $locale = app()->getLocale();
    $headerLogos = LocaleAssets::headerLogos($locale);
    $homeLogo = LocaleAssets::homeLogo($locale);
    $yandexId = site_setting('yandex_metrika', '103799675');

    try {
        $footer_settings = SiteSettings::query()
            ->whereIn('name', ['acdf', 'acdf_address', 'acdf_phone', 'acdf_email'])
            ->pluck('value', 'name');
        $social_links = SocialLink::where('status', 1)->orderBy('order_by')->get();
        $footer_menus = Menu::where('status', 1)->where('position', 2)->orderBy('order_by')->get();
    } catch (\Throwable) {
        $footer_settings = collect();
        $social_links = collect();
        $footer_menus = collect();
    }
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#003DA7">
    <meta name="msapplication-navbutton-color" content="#003DA7">
    <meta name="apple-mobile-web-app-status-bar-style" content="#003DA7">

    <title>{{ translator('app', 'Page not found!') }}</title>

    <x-yandex-metrika :id="$yandexId" />

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body class="lang-{{ $locale }}">

    <main>
        <div class="wrapper error_page">
            <section class="hero error_page w-100">
                <div class="wrapper_header_hero d-flex"
                    style="background-image: url('/images/hero_background_image.png')">

                    <div class="main_header pt-lg-5 d-flex align-items-center flex-row flex-lg-column">
                        <div class="mobile_logo">
                            <a href="{{ route('home') }}" class="logo_link">
                                <img class="dark" src="{{ $headerLogos['dark'] }}" alt="Logo">
                                <img class="light" src="{{ $headerLogos['light'] }}" alt="Logo">
                            </a>
                        </div>
                        <div class="header-actions d-flex align-items-center flex-row flex-lg-column">
                            <div class="toggle"></div>
                        </div>
                    </div>

                    <div class="error_container">
                        <div class="logo-container">
                            <a href="{{ route('home') }}">
                                <img src="{{ $homeLogo }}" alt="Logo">
                            </a>
                        </div>

                        <section class="error-page">
                            <div class="error-page__wrapper">
                                <h1 class="error-page__title">404</h1>
                                <div class="error-page__message">{{ translator('app', 'Page not found!') }}</div>
                                <div class="error-page__description">
                                    {{ translator('app', "The resource you are looking for doesn't exist or might have been removed.") }}
                                </div>
                                <div class="button">
                                    <a href="{{ route('home') }}" class="button__link"
                                        aria-label="{{ translator('app', 'Back to homepage') }}">
                                        <span class="button__text">{{ translator('app', 'Back to homepage') }}</span>
                                    </a>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </section>
        </div>

        <x-footer :footer_settings="$footer_settings" :social_links="$social_links" :footer_menus="$footer_menus" />
    </main>

    @include('site._registration_form')

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>
