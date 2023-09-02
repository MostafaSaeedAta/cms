@if (is_plugin_active('ecommerce'))
    @if (($categories = get_featured_product_categories()) && $categories->count())
        @php
            $numberOfDisplays = (int) Arr::get($config, 'number_of_display');
            $categories->loadCount('products');
            $categories = $categories->take($numberOfDisplays);
        @endphp
        @if ($numberOfDisplays > 0)
            <div class="single-widget mb-4">
                <h3 class="widget-header">{{ __('categories') }}</h3>
                <div class="categories-list">
                    @foreach ($categories as $category)
                        <div class="single-cat">
                            <a href="{{ $category->url }}">
                                <div class="details">
                                    <i class="fi fi-rr-shop"></i>

                                    {{-- <img src="{{ RvMedia::getImageUrl($category->image, null, false, RvMedia::getDefaultImage()) }}"
                                    alt="{{ $category->name }}"> --}}
                                    <span>{!! BaseHelper::clean($category->name) !!}</span>
                                </div>
                                <span class="number">
                                    {{ $category->products_count }}
                                </span>
                            </a>
                        </div>
                    @endforeach


                    {{-- <div class="single-cat">
                    <a href="#">
                        <div class="details">
                            <i class="fi fi-rr-shop"></i>
                            <span>ملابس وتسوق</span>
                        </div>
                        <span class="number">
                            14
                        </span>
                    </a>
                </div>
                <div class="single-cat">
                    <a href="#">
                        <div class="details">
                            <i class="fi fi-rr-smartphone"></i>
                            <span>اجهزة سمارت فون</span>
                        </div>
                        <span class="number">
                            22
                        </span>
                    </a>
                </div>
                <div class="single-cat">
                    <a href="#">
                        <div class="details">
                            <i class="fi fi-rr-tablet"></i>
                            <span>اجهزة تابلت</span>
                        </div>
                        <span class="number">
                            9
                        </span>
                    </a>
                </div>
                <div class="single-cat">
                    <a href="#">
                        <div class="details">
                            <i class="fi fi-rr-laptop"></i>
                            <span>كمبوتر ولابتوب</span>
                        </div>
                        <span class="number">
                            12
                        </span>
                    </a>
                </div>
                <div class="single-cat">
                    <a href="#">
                        <div class="details">
                            <i class="fi fi-rr-mouse"></i>
                            <span>إكسسوارات إلكترونية</span>
                        </div>
                        <span class="number">
                            27
                        </span>
                    </a>
                </div>
                <div class="single-cat">
                    <a href="#">
                        <div class="details">
                            <i class="fi fi-rr-book"></i>
                            <span>كتب ومجلات</span>
                        </div>
                        <span class="number">
                            4
                        </span>
                    </a>
                </div> --}}
                </div>
            </div>
        @endif
    @endif
@endif
