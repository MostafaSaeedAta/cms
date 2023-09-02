<section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
    </div>
    
    <div class="form-group">
        <label class="control-label">{{ __('Subtitle') }}</label>
        <input type="text" name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" placeholder="{{ __('Subtitle') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Style') }}</label>
        {!! Form::customSelect('style', [
                'style-1' => __('Style 1'),
                'style-2' => __('Style 2'),
                'style-3' => __('Style 3'),
                'style-4' => __('Style 4'),
                'style-5' => __('Style 5'),
                'style-6' => __('Style 6'),
                'style-7' => __('Style 7'),
            ], Arr::get($attributes, 'style')) !!}
    </div>

    @php
        $fields = [
            'title' => [
                'title' => __('Title'),
            ],
            'subtitle' => [
                'title' => __('Subtitle'),
            ],
            'image' => [
                'type'  => 'image',
                'title' => __('Image'),
            ],
            'bg_color' => [
                'type'  => 'color',
                'title' => __('Background color'),
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
