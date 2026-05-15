<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">

    <meta name="theme-color" content="#003DA7">
    <title>@yield('title', config('app.name'))</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/swiper-bundle.min.css">

    @stack('styles')
</head>
<body class="lang-{{ app()->getLocale() }}">

<main>
    <div class="wrapper d-flex">
        @yield('content')
    </div>

    @yield('footer')
</main>

@stack('scripts')
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/swiper-bundle.min.js"></script>
<script src="/js/jquery.fancybox.min.js"></script>
<script>
    window.ROUTES = {
        getPrograms: '{{ route('get-programs') }}',
        getArticle:  '{{ route('get-article') }}'
    };
</script>
<script src="/js/main.js"></script>
</body>
</html>
