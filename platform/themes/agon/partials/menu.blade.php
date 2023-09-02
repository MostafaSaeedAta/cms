<ul {!! $options !!}>
    @foreach ($menu_nodes as $key => $row)
        <li @if ($row->has_child || $row->css_class || $row->active) class="@if ($row->has_child) has-children @endif @if ($row->css_class) {{ $row->css_class }} @endif @if ($row->active) active @endif" @endif>
            <a href="{{ url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif>
                @if ($iconImage = $row->getMetadata('icon_image', true))
                    <img src="{{ RvMedia::getImageUrl($iconImage) }}" alt="icon image" class="menu-icon-image" />
                @elseif ($row->icon_font)
                    <i class="{{ trim($row->icon_font) }}"></i>
                @endif
                {{ $row->title }}
            </a>
            @if ($row->has_child)
                {!! Menu::generateMenu([
                    'menu'       => $row,
                    'menu_nodes' => $row->child,
                    'view'       => 'menu',
                    'options'    => [
                        'class' => 'sub-menu ' . ($row->getMetadata('child_style', true) == 'two_col' ? 'two-col' : ''),
                    ],
                ]) !!}
            @endif
        </li>
        @if ($loop->iteration % 2 == 0 && !$loop->last && $menu && $menu->id && $menu->getMetadata('child_style', true) == 'hr_per_2_child')
            <li class="hr">
                <span></span>
            </li>
        @endif
    @endforeach
</ul>
