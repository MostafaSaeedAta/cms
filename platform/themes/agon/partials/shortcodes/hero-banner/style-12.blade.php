<div class="banner-hero banner-homepage6">
    <div class="container mt-40">
        <div class="row">
            <div class="col-lg-6 mt-30">
                <h1 class="text-display-4">{!! BaseHelper::clean($shortcode->title) !!}</h1>
            </div>
            <div class="col-lg-5 offset-xl-1 mt-30">
                <p class="text-body-lead-large color-gray-500">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                <div class="mt-40">
                    @if ($shortcode->primary_url)
                        <a class="btn btn-black shape-square icon-arrow-right-white"
                            href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Get Start') }}</a>
                    @endif
                    @if ($shortcode->secondary_url)
                        <a class="btn btn-link icon-triangle color-gray-900 ml-40"
                            href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('How it works') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

