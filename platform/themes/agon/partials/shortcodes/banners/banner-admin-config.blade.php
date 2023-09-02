
 <section>
    <div class="form-group">
        <label class="control-label">{{ __('Title') }}</label>
        <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" />
    </div>

    {{-- <div class="form-group">
        <label class="control-label">{{ __('Highlight Text') }}</label>
        <input name="highlight_text" value="{{ Arr::get($attributes, 'highlight_text') }}" class="form-control" />
    </div> --}}

    <div class="form-group">
    <label class="control-label">{{ __('Highlight Text') }}</label>
        <textarea name="text"  class="form-control" rows="4" cols="50">
            {{ Arr::get($attributes, 'text') }}

        </textarea>
    </div>

    {{-- <div class="form-group">
        <label class="control-label">{{ __('Subtitle') }}</label>
        <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" />
    </div> --}}

    {{-- <div class="form-group">
        <label class="control-label">{{ __('Image') }}</label>
        {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
    </div> --}}

    {{-- <div class="form-group">
        <label class="control-label">{{ __('Mini Image') }}</label>
        {!! Form::mediaImage('mini_image', Arr::get($attributes, 'mini_image')) !!}
    </div> --}}

    <div class="form-group">
        <label class="control-label">{{ __('Background Image 1') }}</label>
        {!! Form::mediaImage('bg_image_1', Arr::get($attributes, 'bg_image_1')) !!}
    </div>

    {{-- <div class="form-group">
        <label class="control-label">{{ __('Background Image 2') }}</label>
        {!! Form::mediaImage('bg_image_2', Arr::get($attributes, 'bg_image_2')) !!}
    </div> --}}



    {{-- <div class="form-group">
        <label class="control-label">{{ __('Secondary Button URL') }}</label>
        <input name="secondary_url" value="{{ Arr::get($attributes, 'secondary_url') }}" class="form-control" />
    </div> --}}

   


</section>
