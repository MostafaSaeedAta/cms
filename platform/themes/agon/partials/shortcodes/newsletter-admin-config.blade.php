<section>
    <div class="form-group">
        <label class="control-label">{{ __('Name') }}</label>
        <input type="text" name="name" value="{{ Arr::get($attributes, 'name') }}" class="form-control" placeholder="{{ __('Name') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Subtitle') }}</label>
        <input type="text" name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" placeholder="{{ __('Subtitle') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Link') }}</label>
        <input type="text" name="link" value="{{ Arr::get($attributes, 'link') }}" class="form-control" placeholder="{{ __('Link') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Text Link') }}</label>
        <input type="text" name="text_link" value="{{ Arr::get($attributes, 'text_link') }}" class="form-control" placeholder="{{ __('Text Link') }}">
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Image') }}</label>
        {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">{{ __('Mini image') }}</label>
        {!! Form::mediaImage('mini_image', Arr::get($attributes, 'mini_image')) !!}
    </div>
</section>
    