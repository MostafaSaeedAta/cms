<section class="section-box">
    <div class="container mb-20 mt-140">
        <div class="bdrd-58 box-gray-100 icon-wave">
            @if ($shortcode->image)
                <span class="icon-wave-before" style="background: url({{ RvMedia::getImageUrl($shortcode->image) }})"></span>
            @endif

            <div class="row">
                <div class="col-lg-12 mb-60">
                    @if ($shortcode->highlight)
                        <span class="text-body-capitalized text-uppercase">{!! BaseHelper::clean($shortcode->highlight) !!}</span>
                    @endif
                    <h2 class="text-heading-3 color-gray-900 mt-10">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                    <p class="text-body-text color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                </div>
                <div class="col-lg-4 mb-40">
                    <h4 class="text-heading-6 color-gray-900 icon-home mb-10 mt-10">{{ $shortcode->name }}</h4>
                    <p class="text-body-text color-gray-600">{{ $shortcode->address }}</p>
                    <p class="text-body-text color-gray-600" dir="ltr">{{ $shortcode->phone }}</p>
                    <p class="text-body-text color-gray-600">{{ $shortcode->email }}</p>
                </div>
                <div class="col-lg-8">
                    {!! Form::open(['route' => 'public.send.contact', 'class' => 'contact-form']) !!}
                        {!! apply_filters('pre_contact_form', null) !!}

                        <span id="error-msg"></span>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="" placeholder="{{ __('Enter your name') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="" placeholder="{{ __('Enter your email') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="phone" value="" placeholder="{{ __('Enter your phone') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" name="subject" value="" placeholder="{{ __('Enter your subject') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="content" placeholder="{{ __('Tell us about yourself') }}"></textarea>
                                </div>
                            </div>
                            @if (is_plugin_active('captcha'))
                                @if (setting('enable_captcha'))
                                    <div class="col-12">
                                        <div class="mb-3">
                                            {!! Captcha::display() !!}
                                        </div>
                                    </div>
                                @endif

                                @if (setting('enable_math_captcha_for_contact_form', 0))
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="math-group">{{ app('math-captcha')->label() }}</label>
                                            {!! app('math-captcha')->input(['class' => 'form-control', 'id' => 'math-group', 'placeholder' => app('math-captcha')->getMathLabelOnly() . ' = ?']) !!}
                                        </div>
                                    </div>
                                @endif
                            @endif
                            {!! apply_filters('after_contact_form', null) !!}
                            <div class="col-lg-12 mt-15">
                                <button class="btn btn-black icon-arrow-right-white mr-40 mb-20" type="submit">{{ __('Send Message') }}</button>
                                <br class="d-lg-none d-block">
                                <span class="text-body-text-md color-gray-500 mb-20">{{ __('By clicking contact us button, you agree our terms and policy,') }}</span>
                            </div>

                            <div class="col-12">
                                <div class="contact-form-group mt-4">
                                    <div class="contact-message contact-success-message" style="display: none"></div>
                                    <div class="contact-message contact-error-message" style="display: none"></div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
