@if ($product->isOutOfStock())
    <span class="text-stock">({{ __('Out of stock') }})</span>
@else
    @if (!$productVariation)
        <span class="text-stock">({{ __('Not available') }})</span>
    @else
        @if ($productVariation->isOutOfStock())
            <span class="text-stock">({{ __('Out of stock') }})</span>
        @elseif  (!$productVariation->with_storehouse_management || $productVariation->quantity < 1)
            <span class="text-stock">({!! BaseHelper::clean($productVariation->stock_status_html) !!})</span>
        @elseif ($productVariation->quantity)
            @if (EcommerceHelper::showNumberOfProductsInProductSingle())
                <span class="text-stock">
                    @if ($productVariation->quantity != 1)
                        ({{ __(':number products available', ['number' => $productVariation->quantity]) }})
                    @else
                        ({{ __(':number product available', ['number' => $productVariation->quantity]) }})
                    @endif
                </span>
            @else
                <span class="text-stock">({{ __('In stock') }})</span>
            @endif
        @endif
    @endif
@endif
