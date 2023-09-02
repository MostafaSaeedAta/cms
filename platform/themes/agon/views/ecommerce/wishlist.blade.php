{!! Theme::partial('page-header') !!}

<div class="section-box mt-70"></div>
<section class="section-box">
    <div class="container">
        <div class="row wishlist-page-content py-5 mt-3">
            <div class="col-12">
                @if ($products->total())
                    <table class="table cart-form__contents table-striped" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-thumbnail" width="100"></th>
                                <th class="product-name">{{ __('Product') }}</th>
                                <th class="product-price product-md d-md-table-cell d-none">{{ __('Unit Price') }}</th>
                                <th class="product-quantity product-md d-md-table-cell d-none">{{ __('Stock status') }}</th>
                                @if (EcommerceHelper::isCartEnabled())
                                    <th class="product-subtotal product-md d-md-table-cell d-none"></th>
                                @endif
                                <th class="product-remove"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="cart-form__cart-item cart_item">
                                <td class="product-thumbnail">
                                    <a href="{{ $product->original_product->url }}">
                                        <img src="{{ RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}" class="img-thumbnail">
                                    </a>
                                </td>
                                <td class="product-name d-md-table-cell d-block" data-title="Product">
                                    <a href="{{ $product->original_product->url }}">{!! BaseHelper::clean($product->name) !!}</a>
                                    @if (is_plugin_active('marketplace') && $product->original_product->store->id)
                                        <div class="variation-group">
                                            <span class="text-secondary">{{ __('Vendor') }}:</span>
                                            <span class="text-primary ms-1">
                                                <a href="{{ $product->original_product->store->url }}">{{ $product->original_product->store->name }}</a>
                                            </span>
                                        </div>
                                    @endif
                                </td>
                                <td class="product-price product-md d-md-table-cell d-block" data-title="Price">
                                    <div class="box-price">
                                        <span class="d-md-none title-price">{{ __('Price') }}: </span>
                                        {!! Theme::partial('ecommerce.product-price', compact('product')) !!}
                                    </div>
                                </td>
                                <td class="product-quantity product-md d-md-table-cell d-block" data-title="Stock status">
                                    <div class="without-bg product-stock @if ($product->isOutOfStock()) out-of-stock @else in-stock @endif">
                                        @if ($product->isOutOfStock()) {{ __('Out Of Stock') }} @else {{ __('In Stock') }} @endif
                                    </div>
                                </td>
                                @if (EcommerceHelper::isCartEnabled())
                                    <td class="product-subtotal product-md d-md-table-cell d-block" data-title="Total">
                                        <form class="cart-form" action="{{ route('public.cart.add-to-cart') }}" method="POST">
                                            @csrf
                                            <input type="hidden"
                                                name="id" class="hidden-product-id"
                                                value="{{ ($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id }}"/>
                                            <input type="hidden" name="qty" value="1">
                                            <div class="button-add text-end">
                                                <button type="submit" class="btn btn-cart @if ($product->isOutOfStock()) disabled @endif"
                                                        @if ($product->isOutOfStock()) disabled @endif>{{ __('Add') }}</button>
                                            </div>
                                        </form>
                                    </td>
                                @endif
                                <td class="product-remove">
                                    <button type="button" class="fs-4 remove btn remove-wishlist-item" href="#"
                                        data-url="{{ route('public.wishlist.remove', $product->id) }}"
                                        aria-label="{{ __('Remove this item') }}">
                                        <i class="fi fi-rr-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {!! $products->links() !!}
                    </div>
                @else
                    <p class="text-center">{{ __('No products in wishlist!') }}</p>
                @endif
            </div>
        </div>
    </div>
</section>
