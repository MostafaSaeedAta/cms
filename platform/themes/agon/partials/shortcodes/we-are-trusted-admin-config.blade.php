<section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control"
               placeholder="{{ __('Title') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Subtitle') }}</label>
        <input type="text" name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control"
               placeholder="{{ __('Subtitle') }}">
    </div>

    @php
        $fields = [
            'tab_name' => [
                'title'    => __('Tab name'),
                'required' => true,
            ],
            'title' => [
                'title'    => __('Title'),
                'required' => true,
            ],
            'subtitle' => [
                'title' => __('Subtitle'),
            ],
            'link' => [
                'title'       => __('Link'),
                'placeholder' => __('Learn more link'),
            ],
            'link_title' => [
                'title'       => __('Link Title'),
                'placeholder' => __('Learn more link title'),
            ],
            'open_in_new_tab' => [
                'type'        => 'checkbox',
                'title'       => __('Open in new tab?'),
            ],
            'video' => [
                'title' => __('Video'),
            ],
            'image' => [
                'type'  => 'image',
                'title' => __('Image'),
            ],
            'bg_color' => [
                'type'  => 'color',
                'title' => __('Background Color'),
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
