<div class="row">
    <div class="col-lg-6">
        <div>
            <img src="{{ RvMedia::getImageUrl($product->image) }}" alt="{{ $product->name }}">
        </div>
    </div>
    <div class="col-lg-6">
        {!! Theme::partial('ecommerce.product-info', compact('product', 'productVariation', 'selectedAttrs')) !!}
    </div>
</div>
