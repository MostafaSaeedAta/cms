<section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
    </div>

    <div class="form-group">
        <label>{{ __('Primary URL') }}</label>
        <input type="text" class="form-control" name="primary_url" value="{{ Arr::get($attributes, 'primary_url') }}">
    </div>

    <div class="form-group">
        <label>{{ __('Primary Title') }}</label>
        <input type="text" class="form-control" name="primary_title" value="{{ Arr::get($attributes, 'primary_title') }}">
    </div>

    <div class="form-group">
        <label>{{ __('Featured') }}</label>
        <input type="text" class="form-control" name="featured" value="{{ Arr::get($attributes, 'featured') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Style') }}</label>
        {!! Form::customSelect('style', [
                'style-1' => __('Style 1'),
                'style-2' => __('Style 2'),
                'style-3' => __('Style 3'),
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
            'count' => [
                'type'  => 'number',
                'title' => __('Count'),
            ],
            'extra' => [
                'title' => __('Extra'),
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
