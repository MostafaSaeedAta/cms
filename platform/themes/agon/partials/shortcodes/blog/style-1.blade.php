<section class="section-box mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="text-heading-1 mb-10">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <p class="text-body-lead-large color-gray-600">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
            <div class="col-lg-4 text-lg-end text-start pt-30">
                <a class="btn btn-black icon-arrow-right-white" href="{{ get_blog_page_url() }}">{{ __('View More') }}</a>
            </div>
        </div>
    </div>
    <div class="container mt-90">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-sm-12 pr-30">
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
    </div>
</section>
