<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @yield('styles')
    <title>Posts</title>
</head>

<body>
    <header class="header">
        <div class="header__title">Header</div>
        <div class="header__list">
            <a href="/" class="header__link">Homepage</a>
            <a href="{{ route('post.index') }}" class="header__link">All Posts</a>
            <a href="{{ route('post.create') }}" class="header__link">New Post</a>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
