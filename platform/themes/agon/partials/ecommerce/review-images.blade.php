@if (count($product->review_images))
    <div class="my-3">
        <h4 class="mb-30 title-question">{{ __('Images from customer (:count)', ['count' => count($product->review_images)]) }}</h4>
        <div class="review-images row m-0 g-0 review-images-total">
            @foreach ($product->review_images as $img)
                <a href="{{ RvMedia::getImageUrl($img) }}" class="col-lg-1 col-sm-2 col-3 more-review-images @if ($loop->iteration > 12) d-none @endif">
                    <div class="border position-relative rounded">
                        <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" alt="{{ $product->name }}" class="img-fluid rounded h-100">
                        @if ($loop->iteration == 12 && (count($product->review_images) - $loop->iteration > 0))
                            <span>+{{ count($product->review_images) - $loop->iteration }}</span>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endif
