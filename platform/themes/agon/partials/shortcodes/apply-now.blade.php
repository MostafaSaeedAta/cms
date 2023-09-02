<div class="media-block">
    @if ($shortcode->primary_url)
        <a class="btn btn-green-900 color-white text-heading-6 icon-arrow-right-white mr-10"
            href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Apply Now') }}</a>
    @endif
    @if ($shortcode->secondary_url)
        <a class="btn btn-default icon-arrow-right"
            href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('Contact Us') }}</a>
    @endif
    <div class="float-start float-lg-end mt-30">
        <a class="btn btn-media mr-5" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}">
            <img src="{{ Theme::asset()->url('imgs/facebook-share.svg') }}" alt="facebook">
            <span>{{ __('Share') }}</span>
        </a>
        <a class="btn btn-media mr-5" href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ strip_tags(SeoHelper::getDescription()) }}">
            <img src="{{ Theme::asset()->url('imgs/twitter-share.svg') }}" alt="twitter">
            <span>{{ __('Tweet') }}</span>
        </a>
        <a class="btn btn-media mr-5" href="https://pinterest.com/pin/create/button?media={{ urlencode(RvMedia::getImageUrl(theme_option('logo'), null, false, RvMedia::getDefaultImage())) }}&url={{ urlencode(url()->current()) }}&description={{ strip_tags(SeoHelper::getDescription()) }}">
            <img src="{{ Theme::asset()->url('imgs/pinterest-share.svg') }}" alt="pinterest">
            <span>{{ __('Pin') }}</span>
        </a>
    </div>
</div>
