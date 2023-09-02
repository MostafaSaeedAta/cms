{!! Theme::partial('page-header', ['title' => !empty($title) ? $title : '', 'description' => !empty($description) ? $description : '']) !!}

<section class="section-box">
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
        {!! $posts->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
    </div>
</section>
