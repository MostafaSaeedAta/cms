<section class="section-box">
    <div class="bg-2-opacity-80">
        <div class="box-login">
            <div class="row" style="position:relative;">
                {{-- <div class="col-xxl-7 col-xl-6 col-lg-6 col-md-12 login-left pl-0 d-none d-lg-flex"
                    @if (theme_option('login_page_image'))
                        style="background: url({{ RvMedia::getImageUrl(theme_option('login_page_image')) }}) no-repeat 0 0; background-size: cover;"
                    @endif>
                </div> --}}
                <div class="banner-1-bg-top" style="background: url(&quot;http://127.0.0.1:8000/storage/homepage1/bg-1.png&quot;) 0% 0% / cover no-repeat;"></div>
                <div class="col login-right pr-0">
                    <div class="box-login-form">
                        <div class="box-signup mt-90 mx-auto">
                            
                            <div class="box-form-signup">
                                <form method="POST" action="{{ route('customer.login.post') }}">
                                    <h1 class="text-heading-3 mb-10 text-center">{{ __('Welcome back.') }}</h1>
                                    {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Ecommerce\Models\Customer::class) !!}
                                    <div class="text-center">
                                        <div class="mt-10 box-line-throught mb-20">
                                            <span class="text-body-text color-gray-500" style="font-size:12px;">{{ __('Sign in with your email') }}</span>
                                        </div>
                                    </div>
                                    @if (isset($errors) && $errors->has('confirmation'))
                                        <div class="alert alert-danger">
                                            <span>{!! BaseHelper::clean($errors->first('confirmation')) !!}</span>
                                        </div>
                                        <br>
                                    @endif
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-field">
                                            <span class="text-body-small color-green-900 tag-top">{{ __('Your email') }}</span>
                                            <input type="email" name="email" @class(['form-control', 'is-invalid' => $errors->has('email'), 'input-green-bd' => ! $errors->has('email')]) placeholder="{{ __('Your email') }} *" name="email" value="{{ BaseHelper::clean(old('email')) }}" autofocus>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-field">
                                            <span class="text-body-small color-green-900 tag-top">{{ __('Password') }}</span>
                                            <input type="password" name="password" @class(['form-control', 'is-invalid' => $errors->has('password'), 'input-green-bd' => ! $errors->has('password')]) placeholder="{{ __('Password') }}" value="">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember-check" @if(old('remember', 1)) checked @endif>
                                            <label class="form-check-label" for="remember-check">{{ __('Remember me?') }}</label>
                                        </div>
                                        <div class="form-group">
                                            <a class="text-body-text" href="{{ route('customer.password.reset') }}">{{ __('Forgot password?') }}</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-green-full text-heading-6">{{ __('Continue') }}</button>
                                    </div>
                                    <div>
                                        <span class="text-body-text color-gray-500" style="font-size:14px;">{{ __('Don’t have an account?') }}</span>
                                        <a class="text-body-text color-green-900" href="{{ route('customer.register') }}">{{ __('Sign up') }}</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-1-bg-bottom" style="background: url(&quot;http://127.0.0.1:8000/storage/homepage1/bg-2.png&quot;) 0% 0% / cover no-repeat;"></div>
            </div>
        </div>
    </div>
</section>
