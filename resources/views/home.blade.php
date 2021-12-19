<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>Главная</title>
</head>
<body>
<div id="app" class="wrap">
    <header class="main-header">

        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-light shadow-3 p-4">
                <button class="btn btn-link btn-block border-bottom m-0">Link 1</button>
                <button class="btn btn-link btn-block border-bottom m-0">Link 2</button>
                <button class="btn btn-link btn-block m-0">Link 3</button>
            </div>
        </div>

        <nav class="main-menu container">
            <ul class="main-menu__items">
                <li class="main-menu__item">
                    <a class="main-menu__link" href="#">Карточки</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="">Игры</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="">Скачать</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="">О проекте</a>
                </li>
                <li class="main-menu__item">
                    <a class="main-menu__link" href="">Контакты</a>
                </li>
            </ul>
        </nav>
        <div class="main-logo container">
            <img class="main-logo__image" src="{{ asset('public/images/main-logo.png') }}" alt="">
        </div>

    </header>

    <main class="content">

        <div class="main-cards container">
            <h2 class="main-cards__title">Карточки</h2>
            <div class="big-dummy"></div>
            <div class="main-cards__content">
                Изучаем языки народов Поволжья <br> в новом интерактивном формате
            </div>
        </div>

        <div class="features container">
            <div class="row">
                <div class="features__item col-sm-6">
                    <div class="features__dummy">
                        <div class="features__content">
                            Слова на 6 языках <br> с переводом на русский язык
                        </div>
                    </div>
                </div>

                <div class="features__item col-sm-6">
                    <div class="features__dummy">
                        <div class="features__content">
                            Яркие, запоминающиеся картинки
                        </div>
                    </div>
                </div>

                <div class="features__item col-sm-6">
                    <div class="features__dummy">
                        <div class="features__content">
                            Профессиональное озвучивание слов <br> на языках народов Поволжья
                        </div>
                    </div>
                </div>

                <div class="features__item col-sm-6">
                    <div class="features__dummy">
                        <div class="features__content">
                            Возможность скачивания карточек <br> на своё устройство
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="games">
                <h2 class="games__title">Игры</h2>
                <div class="big-dummy">
                    <div class="games__content">
                        Играй и продолжай изучать языки народов Поволжья!
                    </div>
                </div>
            </div>
        </div>


        <div class="main-about container">
            <p class="main-about__content">
                Проект «Аваз» в игровой форме поможет освоить алфавит и самые употребляемые слова 6 языков народов
                Поволжья – татарского, чувашского, мордовского (эрзя), мордовского (мокша), марийского и удмуртского.
                На каждой карточке есть изображение слова, в котором есть определённая буква алфавита.
                По клику карточка перевернётся, и вы сможете прочитать слово, соответствующее изображению, на русском языке.
                Играйте и учите новые слова на языках народов Поволжья!
            </p>
        </div>
    </main>

    <footer class="main-footer">
        <div class="main-footer__content container">
            <p>2021 Все права защищены</p>
            <p>ООО “Балачак”</p>
        </div>
    </footer>
</div>
</body>
</html>

