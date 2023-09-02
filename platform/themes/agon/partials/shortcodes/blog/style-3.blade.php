<div class="section-box mt-140">
    <div class="container text-center">
        <h2 class="text-heading-1 color-gray-900">{!! BaseHelper::clean($shortcode->title) !!}</h2>
        <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
    </div>
    <div class="container list-category-homepage7 mt-70">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="grid-category-2">
                        <div class="grid-category-image">
                            <a href="{{ $post->url }}">
                                <img src="{{ RvMedia::getImageUrl($post->image, 'large', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                            </a>
                        </div>
                        <a class="text-heading-5 color-gray-900" href="{{ $post->url }}">{!! BaseHelper::clean($post->name) !!}</a>
                        <div class="category-info-bottom">
                            <div class="link-category">
                                @if ($post->categories->count())
                                    <a class="mr-20" href="{{ $post->firstCategory->url }}">{{ $post->firstCategory->name }}</a>
                                @endif
                                <span class="text-date">{{ $post->created_at->translatedFormat('M d, Y') }}</span>
                            </div>
                            <div class="link-readmore">
                                <a href="{{ $post->url }}">{{ __('READ MORE') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-30">
            <a class="btn btn-black icon-arrow-right-white" href="{{ $category ? $category->url : get_blog_page_url() }}">{{ __('Load more resource') }}</a>
        </div>
    </div>
</div>
