<section class="section-box">
    <div class="banner-hero banner-head-image"
         @if ($headerImage = $post->getMetaData('header_image', true))
             style="background: url('{{ RvMedia::getImageUrl($headerImage, null, false, RvMedia::getDefaultImage()) }}');"
         @elseif ($headerImageDefault = theme_option('background_post_single'))
             style="background: url('{{ RvMedia::getImageUrl($headerImageDefault) }}');"
         @endif
    >
        <div class="container">
            <div class="text-center">
                <h1 class="text-heading-1 color-white mb-20">{!! BaseHelper::clean($post->name) !!}</h1>
                @foreach ($post->categories as $category)
                    <a class="tag-1 me-2 bg-6 color-green-900" href="{{ $category->url }}">{!! BaseHelper::clean($category->name) !!}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>
{!! Theme::partial('breadcrumbs') !!}
<section class="section-box mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-3 text-center">
                <div class="social-sticky">
                    <h3 class="text-heading-6 color-gray-400 mb-20 mt-5">{{ __('Share') }}</h3>
                    <a class="share-social share-fb" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"></a>
                    <a class="share-social share-tw" href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ strip_tags(SeoHelper::getDescription()) }}" target="_blank"></a>
                    <a class="share-social share-pi" href="https://pinterest.com/pin/create/button?media={{ urlencode(RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage())) }}&url={{ urlencode(url()->current()) }}&description={{ strip_tags(SeoHelper::getDescription()) }}" target="_blank"></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-10 col-9">
                <div class="text-summary mb-2">{{ $post->description }}</div>
                <p class="text-body-small color-gray-500 mb-30"><strong>{{ __('Posted At') }}</strong>: {{ $post->created_at->translatedFormat('M d, Y') }} - {{ number_format($post->views) }} {{ __('Views') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="single-detail">
                    @if ($post->image)
                        <div class="text-center mb-30">
                            <img class="img-responsive w-100 bdr-16" src="{{ RvMedia::getImageUrl($post->image) }}" alt="{{ $post->name }}">
                        </div>
                    @endif

                    <div class="ck-content">{!! BaseHelper::clean($post->content) !!}</div>

                    @if (!$post->tags->isEmpty())
                        <div class="entry-bottom mt-20">
                            <div class="tags">
                                <span>{{ __('Tags') }}: </span>
                                @foreach ($post->tags as $tag)
                                    <a href="{{ $tag->url }}" rel="tag">{!! BaseHelper::clean($tag->name) !!}</a>@if (!$loop->last),@endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, theme_option('facebook_comment_enabled_in_post', 'no') == 'yes' ? Theme::partial('comments') : null) !!}
            </div>
        </div>
    </div>
</section>
