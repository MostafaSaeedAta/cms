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
            'name' => [
                'title' => __('Name'),
            ],
            'position' => [
                'title' => __('Position'),
            ],
            'image' => [
                'type'  => 'image',
                'title' => __('Image'),
            ],
            'description' => [
                'title' => __('Description'),
            ],
            'facebook' => [
                'title' => __('Facebook'),
            ],
            'twitter' => [
                'title' => __('Twitter'),
            ],
            'instagram' => [
                'title' => __('Instagram'),
            ],
            'linkedin' => [
                'title' => __('LinkedIn'),
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
