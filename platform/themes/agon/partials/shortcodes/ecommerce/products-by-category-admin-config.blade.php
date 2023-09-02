<div class="form-group">
    <label class="control-label">{{ __('Select category') }}</label>
    {!! Form::customSelect('category_id', $categories) !!}
</div>


<div class="form-group">
    <label class="control-label">{{ __('Limit number of products') }}</label>
    <input type="number" name="limit" value="{{ Arr::get($attributes, 'limit') }}" class="form-control" placeholder="{{  __('Default: 3') }}">
</div>
