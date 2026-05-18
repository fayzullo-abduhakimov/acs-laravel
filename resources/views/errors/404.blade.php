<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ translator('app', 'Page not found!') }}</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body class="lang-{{ app()->getLocale() }}">

<section class="error-page">
    <div class="error-page__wrapper">
        <h1 class="error-page__title">404</h1>
        <div class="error-page__message">{{ translator('app', 'Page not found!') }}</div>
        <div class="error-page__description">
            {{ translator('app', "The resource you are looking for doesn't exist or might have been removed.") }}
        </div>
        <div class="button">
            <a href="{{ route('home') }}" class="button__link" aria-label="{{ translator('app', 'Back to homepage') }}">
                <span class="button__text">{{ translator('app', 'Back to homepage') }}</span>
            </a>
        </div>
    </div>
</section>

</body>
</html>
