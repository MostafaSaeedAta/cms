<div class="text-swatches-wrapper attribute-swatches-wrapper attribute-swatches-wrapper product__attribute product__color  d-flex align-items-center gap-3" data-type="text">
    <label class="attribute-name">{{ $set->title }}</label>
    <div class="attribute-values">
        <ul class="text-swatch attribute-swatch color-swatch">
            @foreach($attributes->where('attribute_set_id', $set->id) as $attribute)
                <li data-slug="{{ $attribute->slug }}" data-id="{{ $attribute->id }}"
                    class="attribute-swatch-item mb-0 @if (!$variationInfo->where('id', $attribute->id)->count()) pe-none @endif">
                    <div>
                        <label>
                            <input class="product-filter-item"
                                type="radio"
                                name="attribute_{{ $set->slug }}_{{ $key }}"
                                value="{{ $attribute->id }}"
                                {{ $selected->where('id', $attribute->id)->count() ? 'checked' : '' }}>
                            <span>{{ $attribute->title }}</span>
                        </label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
