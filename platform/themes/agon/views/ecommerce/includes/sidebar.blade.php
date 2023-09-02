@if (request()->input('layout') == 'grid-2')
    <div class="col-xl-3 col-lg-4 col-12 order-lg-1">
        @include(Theme::getThemeNamespace('views.ecommerce.includes.filters'))

        {!! dynamic_sidebar('product_list_sidebar') !!}
    </div>
@else
    <div class="col-12">
        <form action="{{ URL::current() }}" data-action="{{ route('public.products') }}" method="GET" id="products-filter-form">

            <input type="hidden" name="sort-by" class="product-filter-item" value="{{ request()->input('sort-by') }}">
            <input type="hidden" name="layout" class="product-filter-item" value="{{ request()->input('layout') }}">
        </form>
    </div>
@endif
