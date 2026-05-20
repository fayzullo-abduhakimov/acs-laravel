@extends('layouts.main')

@php
    use App\Support\LocaleAssets;

    $locale = app()->getLocale();

    $menuTabCount = $sections->filter(fn($s) => !$s->is_opened && $s->status == 1)->count();
    $totalMenuWidth = $menuTabCount * 60;

    $homeLogo = LocaleAssets::homeLogo($locale);
    $newsletterUrl = site_setting(
        'newsletter_url',
        'https://95a8f6e7.sibforms.com/serve/MUIFAFNnFlzJwGA0A0f7_DNLkzMeFt3lSeDkMU0Nev9O7WE8y3xupK0e3j4DmHphBPHHDWHiyUoX6TgPAtkcnZowNNA6SYkJIzdTZdB8lHVoYOLBB8TkBhesW0CsZJogWX3TdfTv71RKgpSEjmljKTaPMoTceo5JIQDPfmyv5UvTY6fdi7ExLEYwNHwDx6JUf5Cr2REOV9BhQw08',
    );

    $bySectionName = fn(string $name) => $sections->firstWhere('name', $name);

    $heroSection = $bySectionName('hero');
    $researchSection = $bySectionName('research');
    $archiveSection = $bySectionName('archive');
    $aralSchoolSection = $bySectionName('aral_school');
@endphp

@section('content')

    {{-- ─── HERO ─────────────────────────────────────────────────────────────── --}}
    @if ($heroSection)
        <x-section-tab :section="$heroSection" :total-menu-width="$totalMenuWidth" extra-class="hero">
            <div class="wrapper_header_hero d-flex" style="background-image: url(/images/hero_background_image.png)">
                <div class="main_header pt-lg-5 d-flex align-items-center flex-row flex-lg-column">
                    <div class="mobile_logo">
                        <a href="{{ route('home') }}" class="logo_link">
                            <x-logo variant="header" image-class="" alt="Logo" />
                        </a>
                    </div>
                    <div class="header-actions d-flex align-items-center flex-row flex-lg-column">
                        <div class="toggle"></div>
                        <x-language-switcher class="ml-4 ml-lg-0 mt-lg-4 py-4 py-lg-0 my-md-0" />
                    </div>
                </div>

                <div class="hero-container">
                    <div class="logo-container">
                        <img class="w-50" src="{{ $homeLogo }}" alt="Logo">
                    </div>
                    <div class="reg_button_container mt-4 mt-md-5 pl-1 pl-md-2">
                        <a href="{{ $newsletterUrl }}" class="reg_button" target="_blank" rel="noopener">
                            {{ translator('app', 'Subscribe to newsletter') }} ↘
                        </a>
                    </div>

                    <div class="hero-text">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <p>{!! translator('app', 'A future for the planet <br>and Karakalpakstan') !!}</p>
                            </div>
                            <div class="col-12 col-md-6">
                                <p class="text-end">{!! translator('app', 'Autumn<br>2026') !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="social_media_links">
                        <x-social-icons :links="$social_links" />
                    </div>
                </div>
            </div>

            <div class="hero_content d-flex">
                <div class="hero_content_header">
                    <span>{{ translator('app', 'Overview') }}</span>
                </div>
                <div class="main_content">
                    @if ($hero)
                        <div class="main_section_hero">
                            <div class="introduction_block">
                                <div class="introduction_block_title">
                                    <p>{!! $hero->title !!}</p>
                                </div>
                                <div class="introduction_content">
                                    {!! $hero->content !!}
                                </div>
                                @if ($youtube_link)
                                    <div class="embed-responsive">{!! $youtube_link !!}</div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </x-section-tab>
    @endif

    {{-- ─── RESEARCH ─────────────────────────────────────────────────────────── --}}
    @if ($researchSection)
        <x-section-tab :section="$researchSection" :total-menu-width="$totalMenuWidth" extra-class="research">
            <div class="section_header">
                <p class="first_title">{{ translator('app', 'Research') }}</p>
            </div>
            <div class="main_section">
                <div class="main_section_header">
                    <x-section-logo />
                    <div class="header_navigation">
                        <ul>
                            <li><a href="#books" class="navigation_link scroll-link">{{ translator('app', 'Books') }}</a>
                            </li>
                            <li><a href="#articles"
                                    class="navigation_link scroll-link">{{ translator('app', 'Articles') }}</a></li>
                            <li><a href="#" class="nav_link back_link">← {{ translator('app', 'Back') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="main_section_hero">
                    <div class="research_books" id="books">
                        <h2 class="section_title">{{ translator('app', 'Books') }}</h2>
                        <div class="research_header">
                            <div class="col">{{ translator('app', 'Name') }}</div>
                            <div class="col">{{ translator('app', 'Author') }}</div>
                            <div class="col">{{ translator('app', 'Access') }}</div>
                        </div>
                        @if ($books->isNotEmpty())
                            <div class="books_accordion">
                                @foreach ($books as $book)
                                    <x-book-accordion-item :book="$book" />
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="research_articles" id="articles">
                        <h2 class="section_title">{{ translator('app', 'Articles') }}</h2>
                        @if ($articles->isNotEmpty())
                            <div class="articles_row row">
                                @foreach ($articles as $article)
                                    <div class="col-md-6 gy-lg-4 gy-3">
                                        <x-article-card :article="$article" :locale="$locale" />
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="article_section"></div>
            </div>
        </x-section-tab>
    @endif

    {{-- ─── ARCHIVE ──────────────────────────────────────────────────────────── --}}
    @if ($archiveSection)
        <x-section-tab :section="$archiveSection" :total-menu-width="$totalMenuWidth" extra-class="archive">
            <div class="section_header">
                <p class="first_title">{{ translator('app', 'Archive') }}</p>
            </div>
            <div class="main_section">
                <div class="main_section_header">
                    <x-section-logo />
                    <div class="header_navigation">
                        <ul>
                            @foreach ($years as $year)
                                <li>
                                    <button type="button" @class(['navigation_link', 'active' => $loop->first]) data-year="{{ $year }}">
                                        {{ $year }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                @if ($archive_hero)
                    <div class="section_content">
                        <div class="section_title">{{ $archive_hero->title }}</div>
                        <div class="section_description">{{ $archive_hero->subtitle }}</div>
                        <div class="archive_content">{!! $archive_hero->content !!}</div>
                    </div>
                @endif

                <div class="archive_programs">
                    <div class="programs_title">{{ translator('app', 'summit_programme') }}</div>
                    <div class="programs_accordion">
                        @foreach ($program_dates as $date)
                            @php
                                $carbon = \Carbon\Carbon::parse($date->date)->locale(carbon_locale($locale));
                                $daySessions = $sessions->where('date_id', $date->id);
                            @endphp
                            <div class="custom_accordion">
                                <div class="accordion_date">{{ $carbon->isoFormat('D MMMM, dddd') }}</div>
                                <div class="accordion_item_wrapper" style="display: none">
                                    @foreach ($daySessions as $session)
                                        <div class="programs_accordion__item">
                                            <div class="accordion_content">
                                                <div class="accordion__title">{{ $session->title }}</div>
                                                <div class="accordion__body">{!! $session->content !!}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if ($archive_news->isNotEmpty())
                    <div class="archive_news">
                        <div class="news_row">
                            @foreach ($archive_news as $news)
                                <div class="archive_card">
                                    <div class="card_texts">
                                        <div class="card_title">{{ $news->title }}</div>
                                        <div class="card_description">{!! $news->description !!}</div>
                                    </div>
                                    <div class="card_image">
                                        <x-storage-image :path="$news->image" :alt="$news->title" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if ($archive_gallery && $archive_gallery->galleryItems->isNotEmpty())
                    <x-gallery-swiper :items="$archive_gallery->galleryItems" />
                @endif

                <x-partners-grid class="archive" :partners="$partners" :title="translator('app', 'Aral Culture Summit Partners')" />
            </div>
        </x-section-tab>
    @endif

    {{-- ─── ARAL SCHOOL ──────────────────────────────────────────────────────── --}}
    @if ($aralSchoolSection)
        <x-section-tab :section="$aralSchoolSection" :total-menu-width="$totalMenuWidth" extra-class="aral_school redirect-section" :redirect-url="$aralSchoolSection->redirect_url">
            <div class="section_header">
                <p class="first_title">{{ strtoupper(str_replace('_', ' ', $aralSchoolSection->name)) }}</p>
            </div>
        </x-section-tab>
    @endif

@endsection
