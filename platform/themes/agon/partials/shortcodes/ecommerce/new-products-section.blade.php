<<div class="section-box">
    <div class="container">
        <h2 class="text-heading-1 color-gray-900">{!! BaseHelper::clean($shortcode->title) !!}</h2>
        <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
    </div>

    <div class="container mt-120 mb-60">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-12">
                    {!! Theme::partial('ecommerce.product-item', ['product' => $product]) !!}
                </div>
            @endforeach
        </div>
    </div>
</div>

