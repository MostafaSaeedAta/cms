{!! Theme::partial('breadcrumbs') !!}
<div class="section-box mt-70"></div>
<h1 class="text-heading-4 mt-30 d-lg-none">{!! BaseHelper::clean($product->name) !!}</h1>
<section class="section-box">
    <div class="container">
        <div class="row product-details">
            <div class="col-lg-3">
                <div class="widget-area">
                    {!! dynamic_sidebar('product_details_sidebar') !!}
                    {{-- <div class="single-widget mb-4">
                        <h3 class="widget-header">الكلمات المفتاحية</h3>
                        <div class="tags">
                            <a href="#" class="single-word">
                                <div class="icon">
                                    <i class="fi fi-rr-cross"></i>
                                </div>
                                <div class="word">
                                    أزرق
                                </div>
                            </a>
                            <a href="#" class="single-word">
                                <div class="icon">
                                    <i class="fi fi-rr-cross"></i>
                                </div>
                                <div class="word">
                                    حقائب
                                </div>
                            </a>
                            <a href="#" class="single-word">
                                <div class="icon">
                                    <i class="fi fi-rr-cross"></i>
                                </div>
                                <div class="word">
                                    إلكترونيات
                                </div>
                            </a>
                            <a href="#" class="single-word">
                                <div class="icon">
                                    <i class="fi fi-rr-cross"></i>
                                </div>
                                <div class="word">
                                    إكسسوارات
                                </div>
                            </a>
                            <a href="#" class="single-word">
                                <div class="icon">
                                    <i class="fi fi-rr-cross"></i>
                                </div>
                                <div class="word">
                                    التعلم والمعرفة
                                </div>
                            </a>
                        </div>
                    </div> --}}
                    {{-- <div class="single-widget mb-4">
                        <h3 class="widget-header">اشهر المنتجات</h3>
                        <div class="widget-content">
                            <ul class="list-products-sidebar">
                                <li>
                                    <div class="product-item-2 product-item-4">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/05/product-20-4-min.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#">
                                                <h3 class="text-heading-7 color-gray-900">مأكولات شعبية</h3>
                                            </a>
                                            <div class="rating mt-5">
                                                <div class="box-rating d-flex">
                                                    <div class="product-rate me-2">
                                                        <div class="product-rating" style="width: 70%;"></div>
                                                    </div>
                                                    <span class="text-semibold">
                                                        <span>6</span>
                                                    </span>
                                                </div>
                                                <div class="box-prices w-100 d-flex gap-2 mt-5 align-items-end">
                                                    <span class="price-regular mr-5">120 ريال</span>
                                                    <span class="price-regular price-line">200 ريال</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-item-2 product-item-4">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/02/product-11-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#">
                                                <h3 class="text-heading-7 color-gray-900">بن برازيلي فاخر</h3>
                                            </a>
                                            <div class="rating mt-5">
                                                <div class="box-rating d-flex">
                                                    <div class="product-rate me-2">
                                                        <div class="product-rating" style="width: 90%;"></div>
                                                    </div>
                                                    <span class="text-semibold">
                                                        <span>6</span>
                                                    </span>
                                                </div>
                                                <div class="box-prices w-100 d-flex gap-2 mt-5 align-items-end">
                                                    <span class="price-regular mr-5">150 ريال</span>
                                                    <span class="price-regular price-line">180 ريال</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-item-2 product-item-4">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/02/product-7-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#">
                                                <h3 class="text-heading-7 color-gray-900">زبدة زيت الزيتون</h3>
                                            </a>
                                            <div class="rating mt-5">
                                                <div class="box-rating d-flex">
                                                    <div class="product-rate me-2">
                                                        <div class="product-rating" style="width: 90%;"></div>
                                                    </div>
                                                    <span class="text-semibold">
                                                        <span>6</span>
                                                    </span>
                                                </div>
                                                <div class="box-prices w-100 d-flex gap-2 mt-5 align-items-end">
                                                    <span class="price-regular mr-5">150 ريال</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-item-2 product-item-4">
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/02/product-2-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#">
                                                <h3 class="text-heading-7 color-gray-900">تسالي فاخرة</h3>
                                            </a>
                                            <div class="rating mt-5">
                                                <div class="box-rating d-flex">
                                                    <div class="product-rate me-2">
                                                        <div class="product-rating" style="width: 100%;"></div>
                                                    </div>
                                                    <span class="text-semibold">
                                                        <span>6</span>
                                                    </span>
                                                </div>
                                                <div class="box-prices w-100 d-flex gap-2 mt-5 align-items-end">
                                                    <span class="price-regular mr-5">250 ريال</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    {{-- <div class="banner-widget mb-4">
                        <div class="image-contain">
                            <h6 class="widget-banner-text">
                                خصم حتي 20% علي <span>المنتجات</span> الطبيعية
                            </h6>
                            <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/05/banner-11-min.png" alt="banner" >
                        </div>
                    </div> --}}
                </div>
            </div>
            @if (empty(dynamic_sidebar('product_details_sidebar')))
                <div class="col-lg-12">
                @else
                    <div class="col-lg-9">
            @endif

            <div class="row">
            @if (empty(dynamic_sidebar('product_details_sidebar')))
            <div class="col-lg-7">
                    {!! Theme::partial('ecommerce.product-gallery', compact('product', 'productImages')) !!}
                </div>
                <div class="col-lg-5">
                    {!! Theme::partial('ecommerce.product-info', compact('product', 'productVariation', 'selectedAttrs')) !!}
                </div>
                @else
                <div class="col-lg-4">
                    {!! Theme::partial('ecommerce.product-gallery', compact('product', 'productImages')) !!}
                </div>
                <div class="col-lg-8">
                    {!! Theme::partial('ecommerce.product-info', compact('product', 'productVariation', 'selectedAttrs')) !!}
                </div>
            @endif
                
            </div>
            <div class="product-description customed border rounded-2xl p-2 mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav mt-50" role="tablist">
                                <li>
                                    <a class="btn btn-default btn-tab active" href="#tab-1" data-bs-toggle="tab"
                                        role="tab" aria-controls="tab-1"
                                        aria-selected="true">{{ __('Description') }}</a>
                                </li>
                                @if (is_plugin_active('faq') && count($product->faq_items) > 0)
                                    <li>
                                        <a class="btn btn-default btn-tab" href="#tab-2" data-bs-toggle="tab"
                                            role="tab" aria-controls="tab-2"
                                            aria-selected="false">{{ __('Questions & Answers') }}</a>
                                    </li>
                                @endif
                                @if (is_plugin_active('marketplace') && $product->store_id)
                                    <li>
                                        <a class="btn btn-default btn-tab" href="#tab-3" data-bs-toggle="tab"
                                            role="tab" aria-controls="tab-3"
                                            aria-selected="false">{{ __('Vendor') }}</a>
                                    </li>
                                @endif
                                @if (EcommerceHelper::isReviewEnabled())
                                    <li>
                                        <a class="btn btn-default btn-tab" id="product-reviews-tab" href="#tab-4"
                                            data-bs-toggle="tab" role="tab" aria-controls="tab-4"
                                            aria-selected="true"><span class="d-inline-block">{{ __('Reviews') }}</span>
                                            <span class="d-inline-block">({{ $product->reviews_count }})</span></a>
                                    </li>
                                @endif
                            </ul>
                            <div class="tab-content mt-50">
                                <div class="tab-pane fade active show" id="tab-1" role="tabpanel"
                                    aria-labelledby="tab-1">
                                    {!! BaseHelper::clean($product->content) !!}
                                    @if (theme_option('facebook_comment_enabled_in_product', 'yes') == 'yes')
                                        <br />
                                        {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
                                    @endif
                                </div>
                                @if (is_plugin_active('faq') && count($product->faq_items) > 0)
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                                        {!! Theme::partial('ecommerce.faq-items', compact('product')) !!}
                                    </div>
                                @endif
                                @if (is_plugin_active('marketplace') && $product->store_id)
                                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                                        @include(Theme::getThemeNamespace('views.marketplace.includes.info-box'),
                                            ['store' => $product->store]
                                        )
                                    </div>
                                @endif

                                @if (EcommerceHelper::isReviewEnabled())
                                    <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-4">
                                        <div class="comments-area">
                                            {!! Theme::partial('ecommerce.review-images', compact('product')) !!}

                                            <div class="row">
                                                <div class="col-lg-8">
                                                    @if ($product->reviews_count)
                                                        <div class="product-reviews-container">
                                                            <h4 class="mb-30 title-question">
                                                                {{ __('Customer questions & answers') }}</h4>
                                                            <product-reviews-component
                                                                url="{{ route('public.ajax.product-reviews', $product->id) }}"></product-reviews-component>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-4">
                                                    {!! Theme::partial('ecommerce.review-details', compact('product')) !!}
                                                    {!! Theme::partial('ecommerce.review-form', compact('product')) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@if (($products = get_related_products($product)) && $products->count())
    <section class="section-box mt-90">
        <div class="container">
            <h2 class="text-heading-4 color-gray-900">{{ __('You may also like') }}</h2>
            <p class="text-body color-gray-600 mt-10">{{ __('Take it to your cart') }}</p>
        </div>
        <div class="container mt-70">
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        {!! Theme::partial('ecommerce.product-item', ['product' => $item]) !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
