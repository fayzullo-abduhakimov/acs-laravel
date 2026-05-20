@props(['book'])

<div class="accordion_item">
    <div class="accordion_header">
        <div class="accordion_name">{{ $book->name }}</div>
        <div class="accordion_author">{{ $book->author }}</div>
        <div class="accordion_actions">
            <ul class="actions">
                @if ($book->link)
                    <li>
                        <a href="{{ $book->link }}" class="action_link" target="_blank" rel="noopener">
                            {{ translator('app', 'Buy') }} ↗
                        </a>
                    </li>
                @endif
                @if ($book->file)
                    <li>
                        <a href="{{ asset('storage/' . $book->file) }}" class="action_link"
                           target="_blank" rel="noopener">
                            {{ translator('app', 'Download') }}
                        </a>
                    </li>
                @endif
            </ul>
            <button type="button" class="accordion_open"
                    data-text-open="{{ translator('app', 'Read less') }}"
                    data-text-closed="{{ translator('app', 'Read more') }}">
                {{ translator('app', 'Read more') }}
            </button>
        </div>
    </div>
    <div class="accordion_content">
        <div class="content_row row">
            <div class="col-xl-6 col-12">
                <div class="accordion_texts">{!! $book->description !!}</div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="accordion_image">
                    <x-storage-image :path="$book->image" :alt="$book->name" />
                </div>
            </div>
        </div>
    </div>
</div>
