@props([
    'items',
    'wrapperClass' => 'gallery swiper mt-5',
])

<div {{ $attributes->class([$wrapperClass]) }}>
    <div class="swiper-wrapper">
        @foreach ($items as $item)
            <div class="swiper-slide">
                <div class="slide_item">
                    <x-storage-image :path="$item->image" alt="" fallback="" />
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper_navs">
        <div class="slide_prev"><i class="fas fa-arrow-left"></i></div>
        <div class="slide_next"><i class="fas fa-arrow-right"></i></div>
    </div>
</div>
