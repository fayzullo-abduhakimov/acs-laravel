<div class="section_header">
    <p class="first_title">{{ translator('app', 'Location') }}</p>
</div>

<div class="main_section">
    <div class="main_section_header">
        <x-section-logo />
        <div class="header_navigation">
            <ul>
                @foreach ($locations as $location)
                    <li>
                        <a href="#{{ $location->name }}" class="navigation_link scroll-link">
                            {{ $location->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="main_section_content">
        @if ($location_header)
            <div class="section_title">{{ $location_header->title }}</div>
            <div class="section_subtitle">{{ $location_header->subtitle }}</div>
        @endif
        <div class="reg_button_container">
            <button class="reg_button" data-bs-toggle="modal" data-bs-target="#registerModal">
                {{ translator('app', 'Register now') }} ↘
            </button>
        </div>
    </div>

    <div class="main_section_hero">
        <div class="locations_row">
            @foreach ($locations as $location)
                <div class="location_item" id="{{ $location->name }}">
                    <div class="location_name">{{ $location->title }}</div>
                    <div class="location_content">{!! $location->content !!}</div>
                </div>
            @endforeach
        </div>

        @if ($location_gallery && $location_gallery->galleryItems->isNotEmpty())
            <x-gallery-swiper :items="$location_gallery->galleryItems" />
        @endif
    </div>
</div>
