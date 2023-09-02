<section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
    </div>
    
    <div class="form-group">
        <label class="control-label">{{ __('Subtitle') }}</label>
        <input type="text" name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" placeholder="{{ __('Subtitle') }}">
    </div>

    @php
        $fields = [
            'title' => [
                'title' => __('Title'),
            ],
            'image' => [
                'type'  => 'image',
                'title' => __('Image'),
            ],
            'address' => [
                'title' => __('Address'),
            ],
            'phone' => [
                'title' => __('Phone'),
            ],
            'email' => [
                'title' => __('Email'),
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
