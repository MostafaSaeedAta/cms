@switch($shortcode->style)
    @case('style-2')
        {!! Theme::partial('shortcodes.faq.ask-style-2', compact('shortcode')) !!}
        @break
    @default
        {!! Theme::partial('shortcodes.faq.ask-style-1', compact('shortcode')) !!}
@endswitch
