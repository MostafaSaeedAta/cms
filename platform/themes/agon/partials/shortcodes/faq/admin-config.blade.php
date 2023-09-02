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

    @php
        $categoryIds = explode(',', Arr::get($attributes, 'category_ids'));
    @endphp

    <div class="form-group">
        <label class="control-label">{{ __('Categories') }}</label>
        <select class="select-full" name="category_ids" multiple>
            @foreach($categories as $category)
                <option @selected(in_array($category->id, $categoryIds)) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
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
                'required' => true
            ],
            'subtitle' => [
                'title' => __('Subtitle'),
            ],
            'icon' => [
                'type'  => 'icon',
                'title' => __('Icon'),
            ],
        ];
    @endphp

    {!! Theme::partial('shortcodes.partials.tabs', compact('fields', 'attributes')) !!}
</section>
