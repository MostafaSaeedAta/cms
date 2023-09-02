@if ($categories->count())
    @php $categories->loadCount('products'); @endphp

    <div class="section-box mt-90">
        <div class="container">
            <h2 class="text-heading-1 color-gray-900">{!! BaseHelper::clean($shortcode->title) !!}</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                </div>
            </div>
        </div>
        <div class="container mt-70">
            <div class="row">
                @foreach ($categories->take($limit) as $category)
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
