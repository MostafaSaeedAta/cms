<section class="section-box">
    <div class="nav-breadcrumbs bg-gray-100">
        <div class="container">
            <div class="breadcrumb">
                <ul aria-label="breadcrumb">
                    @foreach ($crumbs = Theme::breadcrumb()->getCrumbs() as $i => $crumb)
                        @if (!$loop->last)
                            <li class="@if ($loop->first) home @endif">
                                <a href="{{ $crumb['url'] }}">
                                    {!! BaseHelper::clean($crumb['label']) !!}
                                </a>
                            </li>
                        @else
                            <li aria-current="page">
                                {!! BaseHelper::clean($crumb['label']) !!}
                            </li>
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</section>
