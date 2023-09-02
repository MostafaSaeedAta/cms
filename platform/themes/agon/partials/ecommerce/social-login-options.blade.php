@if (SocialService::hasAnyProviderEnable())
    @foreach (SocialService::getProviderKeys() as $item)
        @if (SocialService::getProviderEnabled($item))
            <a class="btn btn-login-google color-gray-500 text-heading-6 box-shadow-2 my-1"
                href="{{ route('auth.social', isset($params) ? array_merge([$item], $params) : $item) }}">
                <img class="img-responsive img-middle mr-10 align-middle" src="{{ Theme::asset()->url('imgs/' . $item . '-icon.svg') }}" alt="social-login">
                <span>{{ __('Sign in with :provider', ['provider' => Str::ucfirst($item)]) }}</span>
            </a>
        @endif
    @endforeach
@endif
