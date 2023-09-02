<section>
    <div class="form-group">
        <label>{{ trans('core/base::forms.name') }}</label>
        <input type="text" class="form-control" name="name" value="{{ Arr::get($attributes, 'name') }}">
    </div>

    <div class="form-group">
        <label>{{ __('Title') }}</label>
        <input type="text" class="form-control" name="title" value="{{ Arr::get($attributes, 'title') }}">
    </div>

    <div class="form-group">
        <label>{{ __('Subtitle') }}</label>
        <input type="text" class="form-control" name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}">
    </div>

    <div class="form-group">
        <label>{{ __('iOS link') }}</label>
        <input type="text" class="form-control" name="ios_link" value="{{ Arr::get($attributes, 'ios_link') }}">
    </div>

    <div class="form-group">
        <label>{{ __('iOS image') }}</label>
        {!! Form::mediaImage('ios_image', Arr::get($attributes, 'ios_image')) !!}
    </div>

    <div class="form-group">
        <label>{{ __('Android link') }}</label>
        <input type="text" class="form-control" name="android_link" value="{{ Arr::get($attributes, 'android_link') }}">
    </div>

    <div class="form-group">
        <label>{{ __('Android image') }}</label>
        {!! Form::mediaImage('android_image', Arr::get($attributes, 'android_image')) !!}
    </div>

    <div class="form-group">
        <label>{{ __('Image 1') }}</label>
        {!! Form::mediaImage('image_1', Arr::get($attributes, 'image_1')) !!}
    </div>

    <div class="form-group">
        <label>{{ __('Image 2') }}</label>
        {!! Form::mediaImage('image_2', Arr::get($attributes, 'image_2')) !!}
    </div>

    <div class="form-group">
        <label>{{ __('Background') }}</label>
        {!! Form::mediaImage('background', Arr::get($attributes, 'background')) !!}
    </div>

    <div class="form-group">
        <label>{{ __('Featured') }}</label>
        <textarea name="featured" rows="3" class="form-control">{{ Arr::get($attributes, 'featured') }}</textarea>
    </div>
</section>
