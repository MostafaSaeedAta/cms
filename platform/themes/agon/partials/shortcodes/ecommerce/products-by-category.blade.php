<div class="section-box">
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
