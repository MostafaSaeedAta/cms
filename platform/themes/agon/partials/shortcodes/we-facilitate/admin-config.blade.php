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
        <label class="control-label">{{ __('Highlight') }}</label>
        <input type="text" name="highlight" value="{{ Arr::get($attributes, 'highlight') }}" class="form-control" placeholder="{{ __('Highlight') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Style') }}</label>
        {!! Form::customSelect('style', [
                'style-1' => __('Style 1'),
                'style-2' => __('Style 2'),
            ], Arr::get($attributes, 'style')) !!}
    </div>

    @php
        $fields = [
            'title' => [
                'title'    => __('Title'),
                'required' => true,
            ],
            'subtitle' => [
                'title' => __('Subtitle'),
            ],
            'link' => [
                'title'       => __('Link'),
                'placeholder' => __('Learn more Link'),
            ],
            'image' => [
                'type'  => 'image',
                'title' => __('Image'),
            ],
            'bottom_image' => [
                'type'  => 'image',
                'title' => __('Bottom Image'),
            ],
            'bg_color' => [
                'type'  => 'color',
                'title' => __('Background Color'),
            ],
            'border_color' => [
                'type'  => 'color',
                'title' => __('Border Color'),
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
