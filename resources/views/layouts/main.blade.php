@php
    use App\Models\Page;
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    // Replicates Yii2 asset manager's `appendTimestamp => true`: cache-bust
// local CSS/JS by file mtime so browsers never serve a stale copy.
$asset = function (string $path): string {
    $full = public_path(ltrim($path, '/'));
    return $path . (is_file($full) ? '?v=' . filemtime($full) : '');
};

$locale = app()->getLocale();

$seoPage = \Illuminate\Support\Facades\Cache::remember(
    'seo.page.home',
    3600,
    fn() => Page::where('name', 'home')->first(),
);

$seoTitle = $seoPage
    ? ($seoPage->getTranslation('meta_title', $locale) ?:
    $seoPage->getTranslation('title', $locale))
    : config('app.name');
$seoDescription = $seoPage ? $seoPage->getTranslation('meta_description', $locale) : null;

$ogLogoMap = [
    'ru' => '/images/logo_home/logo_home_new_ru.png',
    'uz' => '/images/logo_home/logo_home_new_uz.png',
    'kk' => '/images/logo_home/logo_home_new_ka.png',
    'en' => '/images/logo_home/logo_home_new_en.png',
];
$ogImage = url($ogLogoMap[$locale] ?? $ogLogoMap['en']);

$yandexMetrika = site_setting('yandex_metrika', '103799675');
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $seoTitle)</title>
    @if ($seoDescription)
        <meta name="description" content="{{ $seoDescription }}">
        <meta property="og:description" content="{{ $seoDescription }}">
    @endif
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:url" content="{{ LaravelLocalization::getLocalizedURL($locale, url()->current()) }}">
    <meta property="og:type" content="website">

    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <link rel="alternate" hreflang="{{ $localeCode }}"
            href="{{ LaravelLocalization::getLocalizedURL($localeCode, url()->current()) }}">
    @endforeach

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">

    <meta name="theme-color" content="#003DA7">
    <meta name="msapplication-navbutton-color" content="#003DA7">
    <meta name="apple-mobile-web-app-status-bar-style" content="#003DA7">

    <link rel="stylesheet" href="{{ $asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ $asset('/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ $asset('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ $asset('/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ $asset('/css/swiper-bundle.min.css') }}">

    @if ($yandexMetrika)
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function(m, e, t, r, i, k, a) {
                m[i] = m[i] || function() {
                    (m[i].a = m[i].a || []).push(arguments)
                };
                m[i].l = 1 * new Date();
                for (var j = 0; j < document.scripts.length; j++) {
                    if (document.scripts[j].src === r) {
                        return;
                    }
                }
                k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                    k, a)
            })(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js?id={{ $yandexMetrika }}', 'ym');
            ym({{ $yandexMetrika }}, 'init', {
                ssr: true,
                webvisor: true,
                clickmap: true,
                ecommerce: "dataLayer",
                accurateTrackBounce: true,
                trackLinks: true
            });
        </script>
        <noscript>
            <div><img src="https://mc.yandex.ru/watch/{{ $yandexMetrika }}" style="position:absolute; left:-9999px;"
                    alt="" /></div>
        </noscript>
        <!-- /Yandex.Metrika counter -->
    @endif

    @stack('styles')
</head>

<body class="lang-{{ $locale }}">

    <main>
        <div class="wrapper d-flex">
            @yield('content')
        </div>

        <x-footer :footer_settings="$footer_settings" :social_links="$social_links" :footer_menus="$footer_menus" />
    </main>

    {{-- @include('site._registration_form') --}}

    <script src="{{ $asset('/js/jquery.min.js') }}"></script>
    <script src="{{ $asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ $asset('/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ $asset('/js/jquery.fancybox.min.js') }}"></script>
    <script>
        window.ROUTES = {
            getPrograms: '{{ route('get-programs') }}',
            getArticle: '{{ route('get-article') }}',
            archiveYear: '{{ route('archive-year') }}'
        };
    </script>
    <script src="{{ $asset('/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
