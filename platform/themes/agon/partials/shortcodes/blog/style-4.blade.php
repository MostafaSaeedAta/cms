<section class="section-box">
    <div class="container mt-60">
        <div class="row">
            <div class="col-lg-1 col-sm-1 col-12"></div>
            <div class="col-lg-10 col-sm-10 col-12 text-center">
                <h2 class="text-heading-1 color-gray-900 mb-10">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
            <div class="col-lg-1 col-sm-1 col-12"></div>
        </div>
    </div>
    <div class="container mt-90">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-sm-12 pr-30 mb-50">
                    <div class="card-grid-style-4">
                        @if ($post->categories->count())
                            <span class="tag-dot">
                                <a href="{{ $post->firstCategory->url }}">{{ $post->firstCategory->name }}</a>
                            </span>
                        @endif
                        <a class="text-heading-4" href="{{ $post->url }}">{!! BaseHelper::clean($post->name) !!}</a>
                        <div class="grid-4-img">
                            <a href="{{ $post->url }}">
                                <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-20 mb-30 text-center">
            <a class="btn btn-black icon-arrow-right-white" href="{{ $category ? $category->url : get_blog_page_url() }}">{{ __('Load more posts') }}</a>
        </div>
    </div>
</section>
