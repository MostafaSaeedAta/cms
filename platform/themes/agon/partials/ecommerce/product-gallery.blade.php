@if (empty(dynamic_sidebar('product_details_sidebar')))
<div class="galleries">
    <div class="detail-gallery">
        <div class="product-image-slider product-image-slider-{{ $product->id }}"
            data-nav=".slider-nav-thumbnails-{{ $product->id }}" data-main=".product-image-slider-{{ $product->id }}">
            @forelse ($productImages as $img)
                <figure class="border-radius-10">
                    <img src="{{ RvMedia::getImageUrl($img) }}" alt="{{ $product->name }}">
                </figure>
            @empty
                <figure class="border-radius-10">
                    <img src="{{ RvMedia::getImageUrl($product->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
                </figure>
            @endforelse
        </div>
    </div>
    <div class="slider-nav-thumbnails slider-nav-thumbnails-{{ $product->id }}">
        @forelse ($productImages as $img)
            <div>
                <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" alt="{{ $product->name }}">
            </div>
        @empty
            <div>
                <img src="{{ RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
            </div>
        @endforelse
    </div>
</div>
@else
<div class="galleries customed">
    <div class="detail-gallery">
        {{--
        <div class="product-image-slider product-image-slider-{{ $product->id }}"
            data-nav=".slider-nav-thumbnails-{{ $product->id }}" data-main=".product-image-slider-{{ $product->id }}">
            @forelse ($productImages as $img)
                <figure class="border-radius-10">
                    <img src="{{ RvMedia::getImageUrl($img) }}" alt="{{ $product->name }}">
                </figure>
            @empty
                <figure class="border-radius-10">
                    <img src="{{ RvMedia::getImageUrl($product->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
                </figure>
            @endforelse
        </div>
        --}}
        <div class="owl-carousel main-slider mb-2">
        @forelse ($productImages as $img)
            <figure class="border-radius-10">
                <img src="{{ RvMedia::getImageUrl($img) }}" alt="{{ $product->name }}">
            </figure>
        @empty
            <figure class="border-radius-10">
                <img src="{{ RvMedia::getImageUrl($product->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
            </figure>
        @endforelse
        </div>
    </div>
    {{-- <div class="slider-nav-thumbnails slider-nav-thumbnails-{{ $product->id }} customed">
        @forelse ($productImages as $img)
            <div>
                <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" alt="{{ $product->name }}">
            </div>
        @empty
            <div>
                <img src="{{ RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
            </div>
        @endforelse
    </div> 
    --}}
    <div class="owl-carousel gallery-slider">
        @forelse ($productImages as $img)
            <div>
                <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" alt="{{ $product->name }}" class="rounded-xl">
            </div>
        @empty
            <div>
                <img src="{{ RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
            </div>
        @endforelse
    </div>
</div>
@endif
{{-- <div class="youtube-video">
    <iframe width="100%" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
    </iframe>
</div> --}}
