<div class="visual-swatches-wrapper attribute-swatches-wrapper product__attribute product__color  d-flex align-items-center gap-3" data-type="visual">
    <label class="attribute-name">{{ $set->title }}</label>
    <div class="attribute-values">
        <ul class="visual-swatch color-swatch attribute-swatch">
            @foreach($attributes->where('attribute_set_id', $set->id) as $attribute)
                <li data-slug="{{ $attribute->slug }}" data-id="{{ $attribute->id }}"
                    class="attribute-swatch-item mb-0 @if (!$variationInfo->where('id', $attribute->id)->count()) pe-none @endif"
                    title="{{ $attribute->title }}">
                    <div class="custom-radio">
                        <label>
                            <input class="form-control product-filter-item"
                                type="radio"
                                name="attribute_{{ $set->slug }}_{{ $key }}"
                                value="{{ $attribute->id }}"
                                {{ $selected->where('id', $attribute->id)->count() ? 'checked' : '' }}>
				            <span style="{{ $attribute->getAttributeStyle($set, $productVariations) }}"></span>
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
