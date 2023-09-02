<div class="section-box">
    <div class="container mt-50">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-sm-8">
                <h3 class="text-heading-1 mb-10">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <p>{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
        </div>
    </div>
    <div class="container mt-80">
        <div class="featured-product owl-carousel owl-theme">
            @foreach ($products->chunk(12) as $chunked)
                        @foreach ($chunked as $product)
                        <div class="item my-4">
                            {!! Theme::partial('ecommerce.product-item', compact('product')) !!}
                        </div>
                        @endforeach
            @endforeach
        </div>
    </div>
</div>
