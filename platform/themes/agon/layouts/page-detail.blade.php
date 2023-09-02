{!! Theme::partial('header') !!}

{!! Theme::partial('page-header', ['withBreadcrumbs' => true]) !!}
<section class="section-box mt-50 mb-50">
    <div class="container">
        <div class="content-detail">
            {!! Theme::content() !!}
        </div>
    </div>
</section>

{!! Theme::partial('footer') !!}
