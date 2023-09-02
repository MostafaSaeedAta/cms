<div class="section-box">
    <div class="container mt-130">
        <div class="row">
            <div class="col-lg-1 col-sm-1 col-12"></div>
            <div class="col-lg-10 col-sm-10 col-12 text-center">
                <h2 class="text-heading-1 color-gray-900 mb-10">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
            <div class="col-lg-1 col-sm-1 col-12"></div>
        </div>
    </div>
    @foreach ($posts->chunk(6) as $chunked)
        <div class="container mt-90">
            <div class="row">
                @foreach ($chunked->take(2) as $post)
                    <div class="col-lg-4 col-sm-6 pr-30 mb-50">
                        <div class="card-grid-style-4">
                            <div class="grid-4-img mb-20">
                                <a href="{{ $post->url }}">
                                    <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                                </a>
                            </div>
                            <a class="text-heading-4" href="{{ $post->url }}">{!! BaseHelper::clean($post->name) !!}</a>
                            <p class="text-body-small color-gray-500 mb-10">{{ $post->created_at->translatedFormat('M d, Y') }}</p>
                            <p class="text-body-text color-gray-500">{{ Str::limit($post->description, 200) }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-4 col-sm-12 pr-30 mb-50">
                    @foreach ($chunked->skip(2) as $post)
                        <div class="card-list-style-1">
                            <a class="text-heading-6" href="{{ $post->url }}">{!! BaseHelper::clean($post->name) !!}</a>
                            <p class="text-body-small color-gray-500 mb-10">{{ $post->created_at->translatedFormat('M d, Y') }}</p>
                            <div class="style-1-img color-bg-10">
                                <a href="{{ $post->url }}">
                                    <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

</div>
