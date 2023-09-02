{!! Theme::partial('page-header') !!}

<div class="container">
    <div class="row reset-password-page py-5 mt-3 justify-content-center">
        <div class="col-sm-6">
            <div class="reset-password-form bg-light p-4">
                <form class="mt-3"  method="POST" action="{{ route('customer.password.reset.post') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}" />
                    <div class="mb-3">
                        <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="text" required="" placeholder="{{ __('Email address') }}"
                            name="email" autocomplete="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="form-control @if ($errors->has('password')) is-invalid @endif" type="password" required="" placeholder="{{ __('Password') }}"
                            name="password">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif" type="password" required="" placeholder="{{ __('Password confirmation') }}"
                            name="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-green-full text-heading-6" type="submit">{{ __('Submit') }}</button>
                    </div>
                </form>

                @if (session('status'))
                    <div class="text-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('success_msg'))
                    <div class="text-success">
                        {{ session('success_msg') }}
                    </div>
                @endif

                @if (session('error_msg'))
                    <div class="text-danger">
                        {{ session('error_msg') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
