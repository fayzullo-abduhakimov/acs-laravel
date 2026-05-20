@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    $currentLocale = app()->getLocale();
@endphp

<div {{ $attributes->class(['languages', 'd-flex', 'text-center']) }}>
    @foreach (LaravelLocalization::getSupportedLocales() as $code => $properties)
        <a rel="alternate"
           hreflang="{{ $code }}"
           href="{{ LaravelLocalization::getLocalizedURL($code) }}"
           @class(['d-block', 'active' => $code === $currentLocale])>
            {{ strtoupper($code) }}
        </a>
    @endforeach
</div>
