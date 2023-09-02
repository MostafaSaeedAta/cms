@php
    $count = Widget::group($sidebar)->count();
    $columns = (int) (12 / $count);
@endphp

<div @class(['col-lg-' . $columns => $columns >= 3, 'col-6 col-lg-3 mb-30' => $columns < 3])>
    <h4 class="text-heading-5">{!! BaseHelper::clean($config['name']) !!}</h4>
    {!!
        Menu::generateMenu([
            'slug'    => $config['menu_id'],
            'view'    => 'footer-menu',
            'options' => ['class' => 'menu-footer mt-20'],
        ])
    !!}
</div>
