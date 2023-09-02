<section class="section-box">
    <div class="bg-6-opacity-30 pt-90">
        <div class="container">
            <div class="box-signup">
                <h1 class="text-heading-3 mb-50 text-center">{{ __('Let’s join us') }}</h1>

                {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Ecommerce\Models\Customer::class) !!}

                <div class="text-center">
                    <div class="mt-40 box-line-throught mb-40">
                        <span class="text-body-text color-gray-500">{{ __('Sign up with your email') }}</span>
                    </div>
                </div>
                <div class="box-form-signup mb-200">
                    <form method="POST" action="{{ route('customer.register.post') }}">
                        @csrf
                        <div class="form-group">
                            <input required @class(['form-control', 'is-invalid' => $errors->has('name'), 'input-green-bd' => ! $errors->has('name')]) name="name" placeholder="{{ __('Your name') }} *" value="{{ BaseHelper::clean(old('name')) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" required @class(['form-control', 'is-invalid' => $errors->has('email'), 'input-green-bd' => ! $errors->has('email')]) name="email" placeholder="{{ __('Your email') }} *" value="{{ BaseHelper::clean(old('email')) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-field">
                                <span class="text-body-small color-green-900 tag-top">{{ __('Password') }}</span>
                                <input type="password" required class="form-control @error('password') is-invalid @else input-green-bd @enderror" placeholder="" autocomplete="new-password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-field">
                                <span class="text-body-small color-green-900 tag-top">{{ __('Re-type Password') }}</span>
                                <input type="password" required class="form-control @error('password_confirmation') is-invalid @else input-green-bd @enderror" placeholder="" name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <p>{{ __('Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.') }}</p>
                        </div>
                        <div class="form-check mb-3">
                            <input type="hidden" name="agree_terms_and_policy" value="0">
                            <input class="form-check-input" type="checkbox" name="agree_terms_and_policy" id="agree-terms-and-policy" value="1" @if (old('agree_terms_and_policy') == 1) checked @endif>
                            <label for="agree-terms-and-policy">{{ __('I agree to terms & Policy.') }}</label>
                            @error('agree_terms_and_policy')
                                <div class="mt-1">
                                    <span class="text-danger small">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        @if (is_plugin_active('captcha') && setting('enable_captcha') && get_ecommerce_setting('enable_recaptcha_in_register_page', 0))
                            <div class="form-group mb-3">
                                {!! Captcha::display() !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <button class="btn btn-green-full text-heading-6">{{ __('Continue') }}</button>
                        </div>
                        <div>
                            <span class="text-body-text color-gray-500">{{ __('Already have an account?') }}</span>
                            <a class="text-body-text color-green-900" href="{{ route('customer.login') }}">{{ __('Sign in now') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="images-lists">
            <div class="row">
                @if (theme_option('register_page_images'))
                    @php($images = json_decode((string)theme_option('register_page_images'), true))
                    @if (is_array($images))
                        @foreach (array_filter($images) as $img)
                            <div class="@if ($loop->iteration == 3) col-lg-4 col-md-4 col-sm-12 @else col-lg-2 col-md-2 col-sm-6 pl-0 @endif @if ($loop->last) pr-0 @endif">
                                <img class="img-responsive img-full img-{{ $loop->iteration }}"
                                    src="{{ RvMedia::getImageUrl($img) }}" alt="{{ RvMedia::getImageUrl($img) }}">
                            </div>
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
