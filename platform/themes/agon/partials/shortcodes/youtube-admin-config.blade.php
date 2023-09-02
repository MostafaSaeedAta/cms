<div class="form-group">
    <label class="control-label">{{ __('Title') }}</label>
    <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('Subtitle') }}</label>
    <input type="text" name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" placeholder="{{ __('Subtitle') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('Youtube URL') }}</label>
    {!! Form::text('url', $content, [
        'class'                    => 'form-control',
        'placeholder'              => 'https://www.youtube.com/watch?v=FN7ALfpGxiI',
        'data-shortcode-attribute' => 'content',
    ]) !!}
</div>

<div class="form-group">
    <label class="control-label">{{ __('Image') }}</label>
    {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
</div>

<div class="form-group">
    <label class="control-label">{{ __('With container') }}</label>
    {!! Form::customSelect('with_container', [
            'yes' => __('Yes'),
            'no'  => __('No'), 
        ], Arr::get($attributes, 'with_container')) !!}
</div>
