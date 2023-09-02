@if (is_plugin_active('newsletter'))
    <div class="sidebar sidebar-gray">
        <div class="widget-title none-bd">
            <h3 class="text-heading-5 color-gray-900">{!! BaseHelper::clean($config['title']) !!}</h3>
        </div>
        <div class="widget-content">
            <p class="text-body-text color-gray-500">{!! BaseHelper::clean($config['subtitle']) !!}</p>
            <form class="form-newletters mt-15 subscribe-form newsletter-form" method="POST" action="{{ route('public.newsletter.subscribe') }}">
                @csrf
                <input class="text-email" name="email" type="email" required placeholder="{{ __('Enter email address') }}">
                @if (setting('enable_captcha') && is_plugin_active('captcha'))
                    <div class="form-group">
                        {!! Captcha::display() !!}
                    </div>
                @endif
                <button class="btn btn-green-900 btn-green-small mt-20" type="submit">{{ __('Submit') }}</button>
            </form>
        </div>
    </div>
@endif
