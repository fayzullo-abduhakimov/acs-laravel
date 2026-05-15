<div class="main_section_header">
    <div class="header_navigation">
        <ul>
            @foreach ($years as $year)
                <button type="button"
                        class="navigation_link {{ $year == $activeYear ? 'active' : '' }}"
                        data-year="{{ $year }}">
                    {{ $year }}
                </button>
            @endforeach
        </ul>
    </div>
</div>

@if ($archive_hero)
    <div class="section_content">
        <div class="section_title">{{ $archive_hero->title }}</div>
        <div class="archive_content">{!! $archive_hero->content !!}</div>
    </div>
@endif

@if ($archive_events->isNotEmpty() && $tags->isNotEmpty())
    <div class="archive_articles">
        @foreach ($tags as $tag)
            @php $tagEvents = $archive_events->where('tag_id', $tag->id); @endphp
            @if ($tagEvents->isNotEmpty())
                <div class="archive_block">
                    <div class="block_title">{{ $tag->title }}</div>
                    <div class="archives">
                        @foreach ($tagEvents as $event)
                            <div class="archive">
                                <button type="button" class="archive_name" data-id="{{ $event->id }}">
                                    {{ $event->title }}
                                </button>
                                <div class="archive_type">{{ $event->tag?->title }}</div>
                                <div class="archive_time">
                                    {{ substr($event->start_time, 0, 5) }} - {{ substr($event->end_time, 0, 5) }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endif

<div class="locations_archive">
    <div class="section_title">Locations</div>
    @if ($old_locations->isNotEmpty())
        <div class="locations_row">
            @foreach ($old_locations as $location)
                <div class="row archive_location">
                    <div class="col-xl-6 col-12">
                        <div class="location_content">
                            <div class="location_name">{{ $location->title }}</div>
                            <div class="location_details">{!! $location->content !!}</div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12">
                        <div class="location_image">
                            <img src="{{ $location->image ? asset('storage/' . $location->image) : '' }}" alt="{{ $location->title }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@if ($partners && $partners->galleryItems->isNotEmpty())
    <div class="partners archive">
        <div class="partners_title">Aral Culture Summit Partners</div>
        <div class="partners_logo">
            @foreach ($partners->galleryItems as $partner)
                <div class="partner_logo">
                    <img src="{{ $partner->image ? asset('storage/' . $partner->image) : '' }}" alt="partner">
                </div>
            @endforeach
        </div>
    </div>
@endif
