@include(Theme::getThemeNamespace('views.loop'), compact('posts') + ['title' => $category->name, 'description' => $category->description])
