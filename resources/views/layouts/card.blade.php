<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app" class="wrap cards {{$lang->alias}}">
    <header class="card-header">
        <div class="card-header__inner">
            <div class="main-menu__wrapper">
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

            <div class="card-pattern__wrap">
                <div class="card-pattern"></div>
            </div>

            <div class="container">
                <div class="card-header__content">
                    <div class="card-logo">
                        <a href="{{ asset('/') }}">
                            <img class="card-logo__image" src="{{ asset('public/images/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="change-language">
                        <div class="change-language__content">
                            <label for="">Выбери язык для изучения <img width="36" src="/public/images/arow.svg" alt=""> </label>
                            <select class="change-language__select" name="" id="">
                                @foreach($data['languages'] as $language)
                                    <option {{($lang->id === $language->id) ? 'selected' : '' }} value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
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

