@php
    $newsletterUrl = site_setting('newsletter_url', 'https://95a8f6e7.sibforms.com/serve/MUIFAFNnFlzJwGA0A0f7_DNLkzMeFt3lSeDkMU0Nev9O7WE8y3xupK0e3j4DmHphBPHHDWHiyUoX6TgPAtkcnZowNNA6SYkJIzdTZdB8lHVoYOLBB8TkBhesW0CsZJogWX3TdfTv71RKgpSEjmljKTaPMoTceo5JIQDPfmyv5UvTY6fdi7ExLEYwNHwDx6JUf5Cr2REOV9BhQw08');
@endphp

<div class="section_header">
    <p class="first_title">{{ translator('app', 'Programme') }}</p>
</div>

<div class="main_section">
    <div class="main_section_header">
        <x-section-logo />
        <div class="header_navigation">
            <ul>
                <li><a href="#partners" class="navigation_link scroll-link">{{ translator('app', 'Partners') }}</a></li>
                <li><a href="#press" class="navigation_link scroll-link">{{ translator('app', 'Press Selection') }}</a></li>
            </ul>
        </div>
    </div>

    <div class="main_section_content">
        @if ($program_header)
            <div class="section_title">{{ $program_header->title }}</div>
            <div class="section_subtitle">{{ $program_header->subtitle }}</div>
        @endif
        <div class="reg_button_container">
            <a href="{{ $newsletterUrl }}" class="reg_button" target="_blank" rel="noopener">
                {{ translator('app', 'Subscribe to newsletter') }} ↘
            </a>
        </div>
    </div>

    <div class="main_section_hero">
        <div class="container-fluid">
            <div class="full_program_container" id="press">
                <div class="full_program_header">
                    <div class="full_program_title"><p>{{ translator('app', 'When') }}</p></div>
                    <div class="event_days">
                        <div class="row">
                            @foreach ($days as $index => $day)
                                @php $carbon = \Carbon\Carbon::parse($day)->locale(carbon_locale()); @endphp
                                <div class="col-4 pl-0">
                                    <button type="button"
                                            @class(['event_day', 'w-100', 'active' => $index === 0])
                                            data-day="{{ $day }}">
                                        {{ $carbon->isoFormat('D MMMM') }}
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @if ($firstDayPrograms->isNotEmpty())
                    <div class="events">
                        <div class="events_container">
                            @foreach ($firstDayPrograms as $program)
                                <div class="row mb-3">
                                    <div class="col-12 col-lg-3 pl-0 pr-0 pr-md-2">
                                        <div class="event_time_location p-2 p-md-4">
                                            <p class="event_time">
                                                {{ substr($program->start_time, 0, 5) }} - {{ substr($program->end_time, 0, 5) }}
                                            </p>
                                            <p class="event_location">{{ $program->location?->title }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-9 pr-0 pl-0 pl-md-2">
                                        <div class="event_data" style="background-color: {{ $program->bg_color ?: '#f3fff4' }}">
                                            <div class="event p-2 p-md-4">
                                                <div class="event_type mb-3 d-flex">
                                                    <span class="event_type_title">{{ $program->tag?->title }}</span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-lg-6 mb-2 mb-lg-0">
                                                        <h3 class="event_title">{!! $program->title !!}</h3>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="event_description">{!! $program->description !!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="master_class">
                    <div class="row">
                        <div class="col-12 col-lg-3 pl-0 pr-0 pr-md-2">
                            <div class="title">
                                {{ translator('app', 'Masterclasses and market last from 11:00 to 16:30') }}
                            </div>
                        </div>
                        <div class="col-12 col-lg-9 pr-0 pl-0 pl-md-2">
                            <div class="description">{!! translator('app', 'Masterclasses and market') !!}</div>
                        </div>
                    </div>
                </div>
            </div>

            <x-partners-grid id="partners" :partners="$partners" :title="translator('app', 'Aral Culture Summit Partners')">
                <div class="partner_texts row">
                    @if ($partners_left)
                        <div class="col-12 col-lg-6 mb-3 mb-md-0">
                            <div class="partners_text">
                                <h2>{{ $partners_left->title }}</h2>
                                {!! $partners_left->content !!}
                            </div>
                        </div>
                    @endif
                    @if ($partners_right)
                        <div class="col-12 col-lg-6 mb-3 mb-md-0">
                            <div class="partners_text">
                                <h2>{{ $partners_right->title }}</h2>
                                {!! $partners_right->content !!}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="partners_action">
                    <div class="action_title">{{ translator('app', 'Click to download the press kit') }}</div>
                    <div class="download_button">
                        <a href="#" class="download_btn">{{ translator('app', 'Press kit') }}</a>
                    </div>
                </div>
            </x-partners-grid>
        </div>
    </div>
</div>
