@if (is_plugin_active('blog'))
    @if (($posts = get_recent_posts($config['number_display'])) && $posts->count() && $posts->loadMissing(['author']))
        <section class="section-box">
            <div class="container mt-130">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <h2 class="text-heading-1 color-gray-900 mb-10">{!! BaseHelper::clean(Arr::get($config, 'title')) !!}</h2>
                        <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean(Arr::get($config, 'subtitle')) !!}</p>
                    </div>
                </div>
            </div>
            <div class="container mt-90">
                <div class="row">
                    @foreach ($posts->take(2) as $post)
                        <div class="col-lg-4 col-sm-6 pr-30 mb-50">
                            <div class="card-grid-style-4">
                                <div class="grid-4-img color-bg-{{ Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) }} mb-20">
                                    <a href="{{ $post->url }}">
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                                    </a>
                                </div>
                                <a class="text-heading-4" href="{{ $post->url }}">{!! BaseHelper::clean($post->name) !!}</a>
                                <p class="text-body-small color-gray-500 mb-4">{{ $post->created_at->translatedFormat('M d, Y') }}</p>
                                <p class="text-body-text color-gray-500">{{ $post->description }}</p>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-4 col-sm-12 pr-30 mb-50">
                        @foreach ($posts->skip(2) as $post)
                            <div class="card-list-style-1">
                                <a class="text-heading-6" href="{{ $post->url }}">{!! BaseHelper::clean($post->name) !!}</a>
                                <p class="text-body-small color-gray-500">{{ $post->created_at->translatedFormat('M d, Y') }}</p>
                                <div class="style-1-img color-bg-{{ Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) }}">
                                    <a href="{{ $post->url }}">
                                        <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
