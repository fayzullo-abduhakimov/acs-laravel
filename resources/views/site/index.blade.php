@extends('layouts.main')

@php
    $locale = app()->getLocale();
    $menuTabCount = $sections->filter(fn($s) => !$s->is_opened && $s->status == 1)->count();
    $totalMenuWidth = $menuTabCount * 60;

    $logoMap = [
        'ru' => '/images/logo_home/logo_home_new_ru.svg',
        'uz' => '/images/logo_home/logo_home_new_uz.svg',
        'kk' => '/images/logo_home/logo_home_new_ka.svg',
        'en' => '/images/logo_home/logo_home_new_en.svg',
    ];
    $logo = $logoMap[$locale] ?? $logoMap['en'];
@endphp

@section('content')
    @foreach ($sections as $section)
        {{-- ARAL SCHOOL (redirect section) --}}
        {{ var_dump($section->name === 'hero') }}
        @if ($section->name === 'aral_school')
            <section data-width="{{ $totalMenuWidth }}" data-redirect="{{ $section->redirect_url }}"
                class="menu_bar {{ $section->name }} redirect-section {{ $section->status == 0 ? 'disabled' : '' }}">
                <div class="section_header">
                    <p class="first_title">{{ strtoupper(str_replace('_', ' ', $section->name)) }}</p>
                </div>
            </section>
        @endif

        {{-- HERO --}}
        @if ($section->name === 'hero')
            <section data-width="{{ $totalMenuWidth }}"
                class="menu_bar {{ $section->name }} {{ $section->is_opened ? 'opened' : '' }} {{ $section->status == 0 ? 'disabled' : '' }}"
                @if ($section->is_opened) style="width: calc(100% - {{ $totalMenuWidth }}px);" @endif>

                <div class="wrapper_header_hero d-flex" style="background-image: url('/images/hero_background_image.png')">
                    <div class="main_header pt-lg-5 d-flex align-items-center flex-row flex-lg-column">
                        <div class="mobile_logo">
                            <a href="#" class="logo_link">
                                <img class="dark" src="/images/logo_header/dark/logo_header_new_en.svg" alt="Logo">
                                <img class="light" src="/images/logo_header/light/logo_header_new_en.svg" alt="Logo">
                            </a>
                        </div>
                        <div class="header-actions d-flex align-items-center flex-row flex-lg-column">
                            <div class="toggle"></div>
                        </div>
                    </div>

                    <div class="hero-container">
                        <div class="logo-container">
                            ARAL <br> CULTURE <br> SUMMIT <br>
                        </div>
                        <div class="reg_button_container mt-4 mt-md-5 pl-1 pl-md-2">
                            <a href="https://95a8f6e7.sibforms.com/serve/MUIFAFN" class="reg_button" target="_blank">
                                Subscribe to newsletter ↘
                            </a>
                        </div>
                        <div class="hero-text">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <p>A future for the planet <br>and Karakalpakstan</p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <p class="text-end">Autumn<br>2026</p>
                                </div>
                            </div>
                        </div>
                        <div class="social_media_links">
                            @foreach ($social_links as $link)
                                <a href="{{ $link->link }}" class="social_link" title="{{ $link->name }}"
                                    target="_blank" aria-label="{{ $link->name }}">
                                    <i class="{{ $link->class }} fa-2x"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="hero_content d-flex">
                    <div class="hero_content_header">
                        <span>Overview</span>
                    </div>
                    <div class="main_content">
                        @if ($hero)
                            <div class="main_section_hero"
                                style="background-image: url('/images/hero_background_image.png')">
                                <div class="introduction_block">
                                    <div class="introduction_block_title">
                                        <p>{{ $hero->title }}</p>
                                    </div>
                                    <div class="introduction_content">
                                        <div class="introduction_content-top">
                                            <div class="top_texts">
                                                More than a single event, the Aral Culture Summit functions as a catalyst
                                                for long-term transformation. As a multi-year, transdisciplinary programme,
                                                it integrates environmental, climate, and place-based cultural initiatives
                                                into a living development infrastructure that brings international attention
                                                to the region's challenges and possibilities while reframing Karakalpakstan
                                                as a site of innovation, care, and cultural vitality.
                                            </div>
                                            <div class="acdf_logo">
                                                <img src="/images/acdf_logo/dark/logo-en.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="medium__texts">
                                            More than a single event, the Aral Culture Summit functions as a catalyst for
                                            long-term transformation. As a multi-year, transdisciplinary programme, it
                                            integrates environmental, climate, and place-based cultural initiatives into a
                                            living development infrastructure that brings international attention to the
                                            region's challenges and possibilities while reframing Karakalpakstan as a site
                                            of innovation, care, and cultural vitality.
                                        </div>
                                        <div class="introduction_bottom">
                                            <div class="introduction__news">
                                                @foreach ($articles->take(2) as $article)
                                                    <a href="#" class="news-card">
                                                        <div class="card-image">
                                                            <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('images/no_image.png') }}"
                                                                alt="{{ $article->title }}">
                                                        </div>
                                                        <div class="card-description">{{ $article->title }}</div>
                                                    </a>
                                                @endforeach
                                            </div>
                                            <div class="bottom__texts">
                                                The programme illuminates Central Asian expertise rooted in local knowledge,
                                                resourcefulness, and lived experience, positioning the region as an active
                                                contributor to global conversations on environmental stewardship, climate
                                                adaptation, cultural heritage, and sustainable development. The 2026 edition
                                                reframes the Aral basin not as a landscape defined solely by environmental
                                                crisis, but as a multispecies home and socio-ecological system where
                                                communities, researchers, cultural practitioners, and institutions
                                                collaborate to address shared challenges and advance new approaches to
                                                coexistence and circular economic development.<br><br>First announced in
                                                March 2023 during the UN Water Conference in New York, the initiative seeks
                                                to foster innovation and collaboration through residencies, workshops,
                                                exhibitions, festivals, and interdisciplinary research. The inaugural Summit
                                                took place in Nukus in April 2025.
                                            </div>
                                        </div>
                                    </div>
                                    @if ($youtube_link)
                                        <div class="embed-responsive">{!! $youtube_link !!}</div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif


        {{-- PROGRAMME --}}
        {{-- <section data-width="{{ $totalMenuWidth }}"
            class="menu_bar {{ $section->name }} {{ $section->is_opened ? 'opened' : '' }} {{ $section->status == 0 ? 'disabled' : '' }}"
            @if ($section->is_opened) style="width: calc(100% - {{ $totalMenuWidth }}px);" @endif>
            @include('site._program')
        </section> --}}

        {{-- LOCATION --}}
        {{-- <section data-width="{{ $totalMenuWidth }}"
            class="menu_bar {{ $section->name }} {{ $section->is_opened ? 'opened' : '' }} {{ $section->status == 0 ? 'disabled' : '' }}"
            @if ($section->is_opened) style="width: calc(100% - {{ $totalMenuWidth }}px);" @endif>
            @include('site._location')
        </section> --}}

        {{-- RESEARCH --}}
        @if ($section->name === 'research')
            <section data-width="{{ $totalMenuWidth }}"
                class="menu_bar {{ $section->name }} {{ $section->is_opened ? 'opened' : '' }} {{ $section->status == 0 ? 'disabled' : '' }}"
                @if ($section->is_opened) style="width: calc(100% - {{ $totalMenuWidth }}px);" @endif>

                <div class="section_header">
                    <p class="first_title">Research</p>
                </div>
                <div class="main_section">
                    <div class="main_section_header">
                        @include('site._section_logo')
                        <div class="header_navigation">
                            <ul>
                                <li><a href="#books" class="navigation_link scroll-link">Books</a></li>
                                <li><a href="#articles" class="navigation_link scroll-link">Articles</a></li>
                                <li><a href="#" class="nav_link back_link">← Back</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="main_section_hero">
                        {{-- BOOKS --}}
                        <div class="research_books" id="books">
                            <h2 class="section_title">Books</h2>
                            <div class="research_header">
                                <div class="col">Name</div>
                                <div class="col">Author</div>
                                <div class="col">Access</div>
                            </div>
                            @if ($books->isNotEmpty())
                                <div class="books_accordion">
                                    @foreach ($books as $book)
                                        <div class="accordion_item">
                                            <div class="accordion_header">
                                                <div class="accordion_name">{{ $book->name }}</div>
                                                <div class="accordion_author">{{ $book->author }}</div>
                                                <div class="accordion_actions">
                                                    <ul class="actions">
                                                        @if ($book->link)
                                                            <li><a href="{{ $book->link }}" class="action_link"
                                                                    target="_blank">Buy ↗</a></li>
                                                        @endif
                                                        @if ($book->file)
                                                            <li><a href="{{ asset('storage/' . $book->file) }}"
                                                                    class="action_link" target="_blank">Download</a></li>
                                                        @endif
                                                    </ul>
                                                    <button type="button" class="accordion_open" data-text-open="Read less"
                                                        data-text-closed="Read more">Read
                                                        more</button>
                                                </div>
                                            </div>
                                            <div class="accordion_content">
                                                <div class="content_row row">
                                                    <div class="col-xl-6 col-12">
                                                        <div class="accordion_texts">{!! $book->description !!}</div>
                                                    </div>
                                                    <div class="col-xl-6 col-12">
                                                        <div class="accordion_image">
                                                            <img src="{{ $book->image ? asset('storage/' . $book->image) : asset('images/no_image.png') }}"
                                                                alt="{{ $book->name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- ARTICLES --}}
                        <div class="research_articles" id="articles">
                            <h2 class="section_title">Articles</h2>
                            @if ($articles->isNotEmpty())
                                <div class="articles_row row">
                                    @foreach ($articles as $article)
                                        <div class="col-md-6 gy-lg-4 gy-3">
                                            <div class="article">
                                                <div class="article_image">
                                                    <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('images/no_image.png') }}"
                                                        alt="{{ $article->title }}">
                                                </div>
                                                <div class="article_date">
                                                    {{ $article->published_date?->translatedFormat('F d, Y') }}
                                                </div>
                                                <div class="article_title">{{ $article->title }}</div>
                                                <button type="button" class="article_link"
                                                    data-id="{{ $article->id }}">Read article</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="article_section"></div>
                </div>
            </section>
        @endif

        {{-- ARCHIVE --}}
        @if ($section->name === 'archive')
            <section data-width="{{ $totalMenuWidth }}"
                class="menu_bar {{ $section->name }} {{ $section->is_opened ? 'opened' : '' }} {{ $section->status == 0 ? 'disabled' : '' }}"
                @if ($section->is_opened) style="width: calc(100% - {{ $totalMenuWidth }}px);" @endif>

                <div class="section_header">
                    <p class="first_title">Archive</p>
                </div>
                <div class="main_section">
                    <div class="main_section_header">
                        @include('site._section_logo')
                        <div class="header_navigation">
                            <ul>
                                @foreach ($years as $year)
                                    <li>
                                        <button type="button" class="navigation_link {{ $loop->first ? 'active' : '' }}"
                                            data-year="{{ $year }}">
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
                        <div class="programs_title">Summit Programme</div>
                        <div class="programs_accordion">
                            @foreach ($program_dates as $date)
                                @php
                                    $carbon = \Carbon\Carbon::parse($date->date)->locale($locale);
                                    $daySessions = $sessions->where('date_id', $date->id);
                                @endphp
                                <div class="custom_accordion">
                                    <div class="accordion_date">
                                        {{ $carbon->isoFormat('D MMMM, dddd') }}
                                    </div>
                                    <div class="accordion_item_wrapper">
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
                                            <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/no_image.png') }}"
                                                alt="{{ $news->title }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($archive_gallery && $archive_gallery->galleryItems->isNotEmpty())
                        <div class="gallery swiper mt-5">
                            <div class="swiper-wrapper">
                                @foreach ($archive_gallery->galleryItems as $item)
                                    <div class="swiper-slide">
                                        <div class="slide_item">
                                            <img src="{{ $item->image ? asset('storage/' . $item->image) : '' }}"
                                                alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper_navs">
                                <div class="slide_prev"><i class="fas fa-arrow-left"></i></div>
                                <div class="slide_next"><i class="fas fa-arrow-right"></i></div>
                            </div>
                        </div>
                    @endif

                    <div class="partners archive">
                        <div class="partners_title">Aral Culture Summit Partners</div>
                        @if ($partners && $partners->galleryItems->isNotEmpty())
                            <div class="partners_logo">
                                @foreach ($partners->galleryItems as $partner)
                                    <div class="partner_logo">
                                        <img src="{{ $partner->image ? asset('storage/' . $partner->image) : '' }}"
                                            alt="partner">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </section>
        @endif
    @endforeach
@endsection

@section('footer')
    @include('site._footer')
@endsection
