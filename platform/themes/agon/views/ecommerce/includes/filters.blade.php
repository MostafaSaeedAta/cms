@php
    $brands = get_all_brands(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED], [], ['products']);
    $tags = app(\Botble\Ecommerce\Repositories\Interfaces\ProductTagInterface::class)->advancedGet([
        'condition' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED],
        'with'      => [],
        'withCount' => ['products'],
        'order_by'  => ['products_count' => 'desc'],
        'take'      => 10,
    ]);
    $rand = mt_rand();
@endphp
<form action="{{ URL::current() }}" data-action="{{ route('public.products') }}"
    method="GET" id="products-filter-form">

    <input type="hidden" name="sort-by" class="product-filter-item" value="{{ request()->input('sort-by') }}">
    <input type="hidden" name="layout" class="product-filter-item" value="{{ request()->input('layout') }}">

    <div class="sidebar">
        <div class="widget-title">
            <h3 class="text-heading-5 color-gray-900">{{ __('Filter items') }}</h3>
        </div>
        <div class="widget-content">
            <div class="nonlinear-wrapper">
                <div class="mt-30">
                    <span class="color-gray-500 d-inline-block mr-5">{{ __('Price Range') }}:</span>
                    <span class="text-heading-5 color-green-900 d-inline-block">
                        <span class="slider__value">
                            <span class="slider__min"></span>
                            {{ get_application_currency()->symbol }}
                        </span> -
                        <span class="slider__value">
                            <span class="slider__max"></span>
                            {{ get_application_currency()->symbol }}
                        </span>
                    </span>
                    <input class="product-filter-item product-filter-item-price-0" name="min_price"
                        data-min="0" value="{{ request()->input('min_price', 0) }}" type="hidden">
                    <input class="product-filter-item product-filter-item-price-1" name="max_price"
                        data-max="{{ $maxPrice = theme_option('max_filter_price', 100000) }}" value="{{ request()->input('max_price', $maxPrice) }}"
                        type="hidden">
                </div>
                <div class="filter-block mb-50 mt-35">
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <div class="nonlinear" data-min="0" data-max="{{ (int) $maxPrice * get_current_exchange_rate() }}"></div>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($brands) > 0)
                <h4 class="text-heading-6 color-green-900">{{ __('Brand') }}</h4>
                <ul class="list-type">
                    @foreach ($brands as $brand)
                        @if ($brand->products_count > 0)
                            <li>
                                <div class="form-check color-gray-500">
                                    <input class="form-check-input product-filter-item" type="checkbox" name="brands[]" id="attribute-brand-{{ $rand }}-{{ $brand->id }}"
                                        value="{{ $brand->id }}" @if(in_array($brand->id, request()->input('brands', []))) checked @endif />
                                    <label class="form-check-label" for="attribute-brand-{{ $rand }}-{{ $brand->id }}">{{ $brand->name }}</label>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif

            @if (count($tags) > 0)
                <h4 class="text-heading-6 color-green-900">{{ __('Tag') }}</h4>
                <ul class="list-type">
                    @foreach ($tags as $tag)
                        @if ($tag->products_count > 0)
                            <li>
                                <div class="form-check color-gray-500">
                                    <input class="form-check-input product-filter-item" type="checkbox" name="tags[]" id="attribute-tag-{{ $rand }}-{{ $tag->id }}"
                                        value="{{ $tag->id }}" @if(in_array($tag->id, request()->input('tags', []))) checked @endif />
                                    <label class="form-check-label" for="attribute-tag-{{ $rand }}-{{ $tag->id }}">{!! BaseHelper::clean($tag->name) !!}</label>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif

            {!! render_product_swatches_filter([
                'view' => Theme::getThemeNamespace('views.ecommerce.attributes.attributes-filter-renderer')
            ]) !!}

        </div>
    </div>
</form>
