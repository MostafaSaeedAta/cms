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
        <label class="control-label">{{ __('Category') }}</label>
        {!! Form::customSelect('category_id', $categories, Arr::get($attributes, 'category_id')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">
            <span>{{ __('Type') }}</span>
            <span class="fa fa-info-circle text-warning" title="{{ __('Not available if category is selected') }}"></span>
        </label>
        {!! Form::customSelect('type', [
                'default'  => __('Latest'),
                'featured' => __('Featured'),
                'recent'   => __('Recent'),
            ], Arr::get($attributes, 'type')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Number of displays') }}</label>
        <input type="text" name="number_of_displays" value="{{ Arr::get($attributes, 'number_of_displays') }}" class="form-control" placeholder="{{ __('Number of displays') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Style') }}</label>
        {!! Form::customSelect('style', [
                'style-1'  => __('Style 1'),
                'style-2'  => __('Style 2'),
                'style-3'  => __('Style 3'),
                'style-4'  => __('Style 4'),
            ], Arr::get($attributes, 'style')) !!}
    </div>
</section>
    