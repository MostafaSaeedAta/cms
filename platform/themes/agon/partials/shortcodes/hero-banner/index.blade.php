@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20);
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            $tabs[] = [
                'title' => $shortcode->{'title_' . $i},
                'count' => $shortcode->{'count_' . $i},
                'image' => $shortcode->{'image_' . $i},
                'extra' => $shortcode->{'extra_' . $i},
            ];
        }
    }
@endphp

<section class="section-box">
    @switch($shortcode->style)
        @case('style-13')
        @case('style-12')
        @case('style-11')
        @case('style-10')
        @case('style-9')
        @case('style-8')
        @case('style-7')
        @case('style-6')
        @case('style-5')
        @case('style-4')
        @case('style-3')
        @case('style-2')
            {!! Theme::partial('shortcodes.hero-banner.' . $shortcode->style, compact('shortcode', 'tabs')) !!}
            @break
        @default
            {!! Theme::partial('shortcodes.hero-banner.style-1', compact('shortcode')) !!}
    @endswitch
</section>
