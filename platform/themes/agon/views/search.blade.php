@include(Theme::getThemeNamespace('views.loop'), compact('posts') + ['title' => __('Search result for: ":query"', ['query' => BaseHelper::stringify(request()->query('q'))])])
