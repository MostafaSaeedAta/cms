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
        <label class="control-label">{{ __('Number of displays ') }}</label>
        <input type="number" name="limit" value="{{ Arr::get($attributes, 'limit') }}" class="form-control" />
    </div>

    {{-- <div class="form-group">
        <label class="control-label">{{ __('Sort by') }}</label>
        {!! Form::customSelect('sort_by', [
                'newst' => __('Newst'),
                'oldest' => __('Oldest'),
            ]) !!}
    </div> --}}


</section>
