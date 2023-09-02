<div class="cart__items">
    @if (Cart::instance('cart')->count() > 0 && Cart::instance('cart')->products()->count() > 0)
        <ul class="mini-product-cart-list">
            @php
                $products = Cart::instance('cart')->products();
            @endphp
            @if (count($products))
                @foreach(Cart::instance('cart')->content() as $key => $cartItem)
                    @php
                        $product = $products->find($cartItem->id);
                    @endphp
                    @if (!empty($product))
                        {!! Theme::partial('ecommerce.cart-mini.item', compact('product', 'cartItem')) !!}
                    @endif
                @endforeach
            @endif
        </ul>
    @else
        <div class="cart_no_items py-3 px-3">
            <span class="cart-empty-message">{{ __('No products in the cart.') }}</span>
        </div>
    @endif
</div>

@if (Cart::instance('cart')->count() > 0 && Cart::instance('cart')->products()->count() > 0)
    <div class="control-buttons">
        @if (EcommerceHelper::isTaxEnabled())
            <div class="mini-cart__total">
                <strong>{{ __('Sub Total') }}:</strong>
                <span class="price-amount">
                    <bdi>{{ format_price(Cart::instance('cart')->rawSubTotal()) }}</bdi>
                </span>
            </div>
            <div class="mini-cart__total">
                <strong>{{ __('Tax') }}:</strong>
                <span class="price-amount">
                    <bdi>{{ format_price(Cart::instance('cart')->rawTax()) }}</bdi>
                </span>
            </div>
            <div class="mini-cart__total">
                <strong class="text-uppercase">{{ __('Total') }}:</strong>
                <span class="price-amount">
                    <bdi>{{ format_price(Cart::instance('cart')->rawSubTotal() + Cart::instance('cart')->rawTax()) }}</bdi>
                </span>
            </div>
        @else
            <div class="mini-cart__total">
                <strong class="text-uppercase">{{ __('Sub Total') }}:</strong>
                <span class="price-amount">
                    <bdi>
                        {{ format_price(Cart::instance('cart')->rawSubTotal()) }}
                    </bdi>
                </span>
            </div>
        @endif
        <div class="mini-cart__buttons mt-2 row">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a class="btn btn-light px-2 py-3" href="{{ route('public.cart') }}">{{ __('View Cart') }}</a>
                @if (session('tracked_start_checkout'))
                    <a class="btn btn-primary checkout px-2 py-3"
                        href="{{ route('public.checkout.information', session('tracked_start_checkout')) }}">{{ __('Checkout') }}</a>
                @endif
            </div>
        </div>
    </div>
@endif
