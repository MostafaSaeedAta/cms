<div class="product-info">
    <div class="justify-content-between align-items-center d-none d-md-flex">
        <div class="box-category-product">
            @foreach ($product->categories as $category)
                <span class="tag-category">{!! BaseHelper::clean($category->name) !!}</span>
            @endforeach
        </div>
        @if (EcommerceHelper::isReviewEnabled())
            <a href="#product-reviews-tab" class="anchor-link">
                <div class="d-flex">
                    <div class="product-rate d-inline-block me-2">
                        <div class="product-rating" style="width: {{ $product->reviews_avg * 20 }}%;"></div>
                    </div>
                    <span class="text-semibold">
                        <span>({{ number_format($product->reviews_count) }})</span>
                    </span>
                </div>
            </a>
        @endif
    </div>
    <h1 class="text-heading-4 mt-30 d-none d-lg-block">{!! BaseHelper::clean($product->name) !!}</h1>
    <div class="box-price">
        <span class="price" id="product-price">{{ format_price($product->front_sale_price_with_taxes) }}</span>
        <span class="price-old @if ($product->front_sale_price === $product->price) d-none @endif">{{ format_price($product->price_with_taxes) }}</span>
        {!! Theme::partial('ecommerce.product-availability', compact('product', 'productVariation')) !!}
    </div>
    <div>
        {!! apply_filters('ecommerce_before_product_description', null, $product) !!}
        <p class="text-body-text color-gray-500">
            {!! BaseHelper::clean($product->description) !!}
        </p>
        {!! apply_filters('ecommerce_after_product_description', null, $product) !!}
    </div>

    {!! Theme::partial('ecommerce.product-flash-sale', compact('product')) !!}

    <form class="cart-form" action="{{ route('public.cart.add-to-cart') }}" method="POST">
        @csrf
        @if ($product->variations()->count() > 0)
            <div class="pr_switch_wrap">
                {!! render_product_swatches($product, [
                    'selected' => $selectedAttrs,
                    'view'     => Theme::getThemeNamespace('views.ecommerce.attributes.swatches-renderer')
                ]) !!}
            </div>
            <div class="number-items-available" style="display: none; margin-bottom: 10px;"></div>
        @endif

        {!! render_product_options($product) !!}

        <input type="hidden"
            name="id" class="hidden-product-id"
            value="{{ ($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id }}"/>

        <div class="detail-extralink mb-30">
            {!! Theme::partial('ecommerce.product-quantity', compact('product')) !!}
            <div class="product-extra-link2">
                <button class="button button-add-to-cart" type="submit">
                    <i class="fi fi-rr-shopping-cart-add"></i>
                    {{-- <span>{{ __('Add to cart') }}</span> --}}
                </button>
                <a class="action-btn hover-up product-wishlist-button" aria-label="{{ __('Add To Wishlist') }}"
                    data-url="{{ route('public.ajax.add-to-wishlist', $product->id) }}" href="#">
                    <i class="fi fi-rr-heart"></i>
                </a>
                {{-- <a class="action-btn hover-up product-compare-button" aria-label="{{ __('Compare') }}"
                    data-url="{{ route('public.compare.add', $product->id) }}" href="#">
                    <i class="fi fi-rr-shuffle"></i>
                </a> --}}
            </div>
        </div>
    </form>
    <div class="box-categories-link">
        @if (is_plugin_active('marketplace') && $product->store_id)
            <div class="item-cat">
                <span class="text-body-text color-gray-900">{{ __('Vendor') }}:</span>
                <a class="text-body-text color-gray-500" href="{{ $product->store->url }}">{{ $product->store->name }}</a>
            </div>
        @endif

        <div class="item-cat meta-sku @if (!$product->sku) d-none @endif">
            <span class="text-body color-gray-900 d-inline-block">{{ __('SKU') }}: </span>
            <span class="text-body color-gray-500 meta-value d-inline-block">{{ $product->sku }}</span>
        </div>
        @if ($product->categories->count())
            <div class="item-cat d-block">
                <span class="text-body color-gray-900 d-inline-block">{{ __('Categories') }}: </span>
                @foreach($product->categories as $category)
                    <a href="{{ $category->url }}" class="text-body meta-value d-inline-block">{!! BaseHelper::clean($category->name) !!}</a>@if (!$loop->last), @endif
                @endforeach
            </div>
        @endif
        @if ($product->tags->count())
            <div class="item-cat d-block">
                <span class="text-body color-gray-900 d-inline-block">{{ __('Tags') }}: </span>
                @foreach($product->tags as $tag)
                    <a href="{{ $tag->url }}" class="text-body meta-value d-inline-block">{!! BaseHelper::clean($tag->name) !!}</a>@if (!$loop->last), @endif
                @endforeach
            </div>
        @endif
    </div>
</div>
