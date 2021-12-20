<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($page))
        <meta name="title" content="{{ $page->seo_title }}"/>
        <meta name="description" content="{{ $page->seo_description }}" />
        <meta name="keywords" content="{{ $page->seo_keywords }}" />
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app" class="wrap page">
    <header class="main-header">

        <div class="container">
            <div class="main-header__content">
                <div class="main-logo">
                    <img class="main-logo__image" src="{{ asset('public/images/main-logo.png') }}" alt="">
                </div>

                <nav class="main-menu container">
                    <ul class="main-menu__items">
                        @foreach($data['pages'] as $page)
                            <li class="main-menu__item">
                                <a class="main-menu__link" href="{{ $page->url }}">{{ $page->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>

            </div>
        </div>
    </header>

    <main class="content">
        <div class="content__body container">
            @yield('content')
        </div>
    </main>

    <footer class="main-footer">
        <div class="main-footer__content container">
            <p>{{ date('Y') }} Все права защищены</p>
            <p>ООО “Балачак”</p>
        </div>
    </footer>
</div>
</body>
</html>

