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
        <label class="control-label">{{ __('Number of proucts displays ') }}</label>
        <input type="number" name="limit"  min="1""{{ Arr::get($attributes, 'limit') }}" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Sort by') }}</label>
        {!! Form::customSelect('sort_by', [
                'newst' => __('Newst'),
                'oldest' => __('Oldest'),
                'random' => __('random'),

    ],  Arr::get($attributes, 'sort_by')) !!}
    </div>


</section>
