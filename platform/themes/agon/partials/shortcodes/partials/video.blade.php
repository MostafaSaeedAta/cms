@if ($shortcode->image)
    <div class="box-image mt-30 mb-30">
        <a aria-label="{{ __('Play video') }}" class="popup-youtube btn-play-video btn-play-middle" href="{{ $shortcode->content }}"></a>
        <img class="img-responsive bdrd-16" src="{{ RvMedia::getImageUrl($shortcode->image) }}"
            alt="{{ $shortcode->image }}">
    </div>
@else
    <div style="position: relative; display: block; height: 0; padding-bottom: 56.25%; overflow: hidden; margin-bottom: 20px;">
        <iframe style="position: absolute; top: 0; bottom: 0; left: 0; width: 100%; height: 100%; border: 0;"
            allowfullscreen frameborder="0" src="{{ $url }}"></iframe>
    </div>
@endif
