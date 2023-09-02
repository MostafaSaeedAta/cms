@php
    $page->loadMissing('metadata');
    Theme::set('header_css_class', $page->getMetadata('header_css_class', true) ?: '');
@endphp

{!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, Html::tag('div', BaseHelper::clean($page->content), ['class' => 'ck-content'])->toHtml(), 
$page) !!}
