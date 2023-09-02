<section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
    </div>
    
    <div class="form-group">
        <label class="control-label">{{ __('Subtitle') }}</label>
        <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Title - left') }}</label>
        <input name="title_left" value="{{ Arr::get($attributes, 'title_left') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Number of displays - left') }}</label>
        <input type="number" name="limit_left" value="{{ Arr::get($attributes, 'limit_left') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Number of displays - right') }}</label>
        <input type="number" name="limit_right" value="{{ Arr::get($attributes, 'limit_right') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Sort by') }}</label>
        {!! Form::customSelect('sort_by', [
                'number_products' => __('Number products'),
                'featured'        => __('Featured'),
            ]) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Link') }}</label>
        <input type="number" name="link" value="{{ Arr::get($attributes, 'link') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Title link') }}</label>
        <input type="number" name="link_title" value="{{ Arr::get($attributes, 'link_title') }}" class="form-control" />
    </div>
</section>
