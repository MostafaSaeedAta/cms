<section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input type="text" name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" placeholder="{{ __('Title') }}">
    </div>

    @php
        $fields = [
            'title' => [
                'title'    => __('Title'),
                'required' => true
            ],
            'image' => [
                'type'     => 'image',
                'title'    => __('Image'),
                'required' => true
            ],
            'link' => [
                'type'     => 'text',
                'title'    => __('URL'),
                'required' => false
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
