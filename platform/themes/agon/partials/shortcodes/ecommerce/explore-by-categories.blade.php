@if ($categories->count())
    <div class="section-box mt-40">
        <div class="container text-center">
            <h2 class="text-heading-1 color-gray-900">{!! BaseHelper::clean($shortcode->title) !!}</h2>
            <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
        </div>
        <div class="container mt-70">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                    <div class="list-categories-number box-bdr-2 mb-30">
                        <div class="header-list-category">
                            <h3 class="text-body-lead-large font-bold">{!! BaseHelper::clean($shortcode->title_left ?: __('Popular Categories')) !!}</h3>
                        </div>
                        <ul class="list-category">
                            @foreach ($categories->take($limitLeft) as $category)
                                <li>
                                    <a href="{{ $category->url }}">{!! BaseHelper::clean($category->name) !!}</a>
                                    <span class="number">{{ $category->products_count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                    <div class="row">
                        @foreach ($categories->skip($limitLeft) as $category)
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="grid-category hover-up">
                                    <a href="{{ $category->url }}">
                                        <div class="grid-image-left-category">
                                            <div class="category-image">
                                                <span class="for-design" @if ($category->image) style="
                                                    background-image: url('{{ RvMedia::getImageUrl($category->image) }}');
                                                    background-size: 65%;
                                                    background-position: center;
                                                    backdrop-filter: none;" @endif></span>
                                            </div>
                                            <div class="category-info">
                                                <h3 class="text-heading-6">{!! BaseHelper::clean($category->name) !!}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($shortcode->link)
                        <div class="row mt-20">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12"></div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="grid-category grid-category-small hover-up">
                                    <a href="{{ $shortcode->link }}">
                                        <div class="grid-image-left-category">
                                            <div class="category-image">
                                                <span class="for-leaf"></span>
                                            </div>
                                            <div class="category-info">
                                            <h3 class="text-heading-6">{{ $shortcode->title_link ?: __('See All Categories') }}</h3>
                                            </div>
                                            <div class="arrow-down-green"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
