{!! Theme::partial('breadcrumbs') !!}

@if (($categories = get_featured_product_categories()) && $categories->count())
    @php $categories->loadCount('products'); @endphp

    <div class="section-box mt-90">
        <div class="container">
            <h2 class="text-heading-1 color-gray-900">{{ __('Browse by category') }}</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="text-body-lead-large color-gray-600 mt-20">{{ __('All the smart devices, electronics or software you need are ready to be discovered. Let’s go!') }}</p>
                </div>
            </div>
        </div>
        <div class="container mt-70">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="category-grid-3 hover-up">
                            <a href="{{ $category->url }}">
                                <div class="category-img">
                                    <img src="{{ RvMedia::getImageUrl($category->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $category->name }}">
                                </div>
                                <h4 class="text-heading-5 mb-5">{!! BaseHelper::clean($category->name) !!}</h4>
                                <p class="text-body-text color-gray-500 d-inline-block">{{ __(':count products', ['count' => $category->products_count]) }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

<section class="section-box mt-90">
    <div class="container">
        <h2 class="text-heading-1 color-gray-900">{{ __('Latest products') }}</h2>
        <p class="text-body-lead-large color-gray-600 mt-20">{{ __('Don’t miss world trending') }}</p>
    </div>
    <div class="container mt-70">
        <div class="row">
            <div class="col order-lg-2">
                @include(Theme::getThemeNamespace('views.ecommerce.includes.toolbar'))

                <div class="products-listing position-relative">
                    @include(Theme::getThemeNamespace('views.ecommerce.includes.product-items'))
                </div>
            </div>
            @include(Theme::getThemeNamespace('views.ecommerce.includes.sidebar'))
        </div>
    </div>
</section>

{!! dynamic_sidebar('product_list_bottom_sidebar') !!}
