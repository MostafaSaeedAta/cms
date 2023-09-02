<div class="banner-hero banner-3">
    <div class="container">
        <div class="text-center">
            @if ($shortcode->highlight_text)
                <span class="tag-1 bg-6 color-green-900">{{ $shortcode->highlight_text }}</span>
            @endif
            <h1 class="text-display-2 color-gray-900 mt-40">{!! BaseHelper::clean($shortcode->title) !!}</h1>
            <div class="text-body-lead-large color-gray-500 mt-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</div>
            @if($shortcode->primary_url || $shortcode->secondary)
                <div class="mt-50">
                    @if ($shortcode->primary_url)
                        <a
                            class="btn btn-black icon-arrow-right-white mb-15"
                            href="{{ $shortcode->secondary_url }}"
                        >
                            {{ $shortcode->primary_title ?: __('Start free trial') }}
                        </a>
                    @endif
                    @if ($shortcode->secondary_url)
                        <a
                            class="btn btn-default icon-arrow-right color-gray-900 ml-20 btn-mb mb-15"
                            href="{{ $shortcode->secondary_url }}"
                        >
                            {{ $shortcode->secondary_title ?: __('Learn more') }}
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

