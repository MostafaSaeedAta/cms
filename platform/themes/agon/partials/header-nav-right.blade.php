<div class="header-nav-right">
    @if ($actionText = theme_option('action_button_text'))
        <div class="action-header d-none d-md-block d-lg-block">
            <a class="btn btn-default hover-up icon-arrow-right text-nowrap" href="{{ theme_option('action_button_url') }}">{{ $actionText }}</a>
        </div>
    @endif
</div>
