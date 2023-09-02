<section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Highlight Text') }}</label>
        <input name="highlight_text" value="{{ Arr::get($attributes, 'highlight_text') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Subtitle') }}</label>
        <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Image') }}</label>
        {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Mini Image') }}</label>
        {!! Form::mediaImage('mini_image', Arr::get($attributes, 'mini_image')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Background Image 1') }}</label>
        {!! Form::mediaImage('bg_image_1', Arr::get($attributes, 'bg_image_1')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Background Image 2') }}</label>
        {!! Form::mediaImage('bg_image_2', Arr::get($attributes, 'bg_image_2')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Video URL') }}</label>
        <input name="video_url" value="{{ Arr::get($attributes, 'video_url') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Video Background') }}</label>
        {!! Form::mediaImage('video_bg', Arr::get($attributes, 'video_bg')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Primary Button Title') }}</label>
        <input name="primary_title" value="{{ Arr::get($attributes, 'primary_title') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Primary Button URL') }}</label>
        <input name="primary_url" value="{{ Arr::get($attributes, 'primary_url') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Secondary Button Title') }}</label>
        <input name="secondary_title" value="{{ Arr::get($attributes, 'secondary_title') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Secondary Button URL') }}</label>
        <input name="secondary_url" value="{{ Arr::get($attributes, 'secondary_url') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Style') }}</label>
        {!! Form::customSelect('style', [
                'style-1'  => __('Style 1'),
                'style-2'  => __('Style 2'),
                'style-3'  => __('Style 3'),
                'style-4'  => __('Style 4'),
                'style-5'  => __('Style 5'),
                'style-6'  => __('Style 6'),
                'style-7'  => __('Style 7'),
                'style-8'  => __('Style 8'),
                'style-9'  => __('Style 9'),
                'style-10' => __('Style 10'),
                'style-11' => __('Style 11'),
                'style-12' => __('Style 12'),
                'style-13' => __('Style 13'),
            ], Arr::get($attributes, 'style')) !!}
    </div>

    @php
        $fields = [
            'title' => [
                'title' => __('Title'),
            ],
            'count' => [
                'type'  => 'number',
                'title' => __('Count'),
            ],
            'extra' => [
                'title' => __('Extra'),
            ],
            'image' => [
                'type'  => 'image',
                'title' => __('Image'),
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
