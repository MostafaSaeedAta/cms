<div class="product-item-2 hover-up">
    <a href="{{ $product->url }}">
        <div class="product-image">
            <img src="{{ RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
        </div>
    </a>
    <div class="box-quick-view">
        <div class="quick-view">
            @if (EcommerceHelper::isWishlistEnabled())
                <a class="like-product product-wishlist-button" href="#"
                    data-url="{{ route('public.ajax.add-to-wishlist', ['product_id' => $product->id]) }}">
                    <i class="fi fi-rr-heart"></i>
                </a>
            @endif
            @if (EcommerceHelper::isCompareEnabled())
                <a class="shuffle-product product-compare-button" href="#"
                    data-url="{{ route('public.compare.add', $product->id) }}" title="{{ __('Compare') }}">
                    <i class="fi fi-rr-shuffle"></i>
                </a>
            @endif
            <a class="view-product product-quick-view-button" href="#"
                data-url="{{ route('public.ajax.quick-view', ['product_id' => $product->id]) }}">
                <i class="fi fi-rr-eye"></i>
            </a>
        </div>
    </div>
    <div class="product-info">
        @if (($category = $product->categories->first()) && $category->id)
            <span class="text-body-small color-gray-500 font-bold">{!! BaseHelper::clean($category->name) !!}</span>
        @else
            <span class="text-body-small color-gray-500 font-bold">&nbsp;</span>
        @endif
        <a href="{{ $product->url }}">
            <h3 class="text-body-lead color-gray-900 text-truncate">{!! BaseHelper::clean($product->name) !!}</h3>
        </a>
        @if (EcommerceHelper::isReviewEnabled())
            <div class="rating mt-10 d-flex">
                <div class="product-rate d-inline-block me-2">
                    <div class="product-rating" style="width: {{ $product->reviews_avg * 20 }}%;"></div>
                </div>
                <span class="text-semibold">
                    <span>({{ number_format($product->reviews_count) }})</span>
                </span>
            </div>
        @endif
        <div class="d-flex mt-20">
            <div class="box-prices">
                @if ($product->front_sale_price === $product->price)
                    <span class="price-regular mr-5">{{ format_price($product->front_sale_price_with_taxes) }}</span>
                @else
                    <span class="price-regular mr-5">{{ format_price($product->front_sale_price_with_taxes) }}</span>
                    <span class="price-regular price-line">{{ format_price($product->price_with_taxes) }}</span>
                @endif
            </div>
            <form class="cart-form" action="{{ route('public.cart.add-to-cart') }}" method="POST">
                @csrf
                <input type="hidden"
                    name="id" class="hidden-product-id"
                    value="{{ $product->id }}"/>
                <input type="hidden" name="qty" value="1">
                <div class="button-add text-end">
                    <button type="submit" class="btn btn-cart @if ($product->isOutOfStock()) disabled @endif"
                        @if ($product->isOutOfStock()) disabled @endif>{{ __('Add') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
