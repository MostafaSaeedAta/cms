{!! Theme::partial('breadcrumbs') !!}

<section class="section-box mt-90">
    <div class="container">
        <h2 class="text-heading-1 color-gray-900">{!! BaseHelper::clean($tag->name) !!}</h2>
        <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($tag->description) !!}</p>
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
