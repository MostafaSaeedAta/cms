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
        <label class="control-label">{{ __('Image') }}</label>
        {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Mini image') }}</label>
        {!! Form::mediaImage('mini_image', Arr::get($attributes, 'mini_image')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Background') }}</label>
        {!! Form::mediaImage('background', Arr::get($attributes, 'background')) !!}
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
                'style-8' => __('Style 8'),
            ], Arr::get($attributes, 'style')) !!}
    </div>

    @php
        $fields = [
            'title' => [
                'title'    => __('Title'),
                'required' => true
            ],
            'subtitle' => [
                'title' => __('Subtitle'),
            ],
            'icon' => [
                'type'  => 'icon',
                'title' => __('Icon'),
            ],
            'image' => [
                'type'  => 'image',
                'title' => __('Image'),
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
