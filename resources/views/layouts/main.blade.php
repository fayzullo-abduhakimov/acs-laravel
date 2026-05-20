@php
    use App\Models\Page;
    use App\Support\LocaleAssets;
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    use Illuminate\Support\Facades\Cache;

    // Replicates Yii2 asset manager's `appendTimestamp => true`: cache-bust
// local CSS/JS by file mtime so browsers never serve a stale copy.
$asset = function (string $path): string {
    $full = public_path(ltrim($path, '/'));
    return $path . (is_file($full) ? '?v=' . filemtime($full) : '');
};

$locale = app()->getLocale();

$seoPage = Cache::remember("seo.page.home.{$locale}", 3600, fn() => Page::where('name', 'home')->first());

$seoTitle = $seoPage
    ? ($seoPage->getTranslation('meta_title', $locale) ?:
    $seoPage->getTranslation('title', $locale))
    : config('app.name');
$seoDescription = $seoPage?->getTranslation('meta_description', $locale);

$ogImage = url(LocaleAssets::ogImage($locale));
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

    {{-- Favicon --}}
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

    <x-yandex-metrika :id="$yandexMetrika" />

    @stack('styles')
</head>

<body class="lang-{{ $locale }}">

    <main>
        <div class="wrapper d-flex">
            @yield('content')
        </div>

        <x-footer :footer_settings="$footer_settings" :social_links="$social_links" :footer_menus="$footer_menus" />
    </main>

    @include('site._registration_form')

    <script src="{{ $asset('/js/jquery.min.js') }}"></script>
    <script src="{{ $asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ $asset('/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ $asset('/js/jquery.fancybox.min.js') }}"></script>
    <script>
        window.ROUTES = {
            getPrograms: '{{ route('get-programs') }}',
            getArticle: '{{ route('get-article') }}',
            archiveYear: '{{ route('archive-year') }}',
        };
    </script>
    <script src="{{ $asset('/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
