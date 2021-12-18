<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-theme">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>

    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">


</head>
<body class="pace-done">




<!--start wrapper-->
<div id="app" class="wrapper">
    <!--start top header-->
    <header class="top-header">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-icon fs-3">
                <i class="bi bi-list"></i>
            </div>
            <div class="top-navbar-right ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li>
                        <a class="dropdown-item" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <div class="d-flex align-items-center">
                                <div class=""><i class="bi bi-lock-fill"></i></div>
                                <div class="ms-3"><span>Выход</span></div>
                            </div>
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--end top header-->

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content mm-active" style="padding: 0px;">
                            <div class="sidebar-header">
                                <div>
                                    <a href="{{ route('admin.dashboard') }}"><h4 class="logo-text">Admin</h4></div></a>
                                <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i></div>
                            </div>

                            <ul class="metismenu" id="menu">
                                <li>
                                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                                        <div class="parent-icon"><i class="bi bi-grid-fill"></i></div>
                                        <div class="menu-title">Языки</div>
                                    </a>
                                    <ul class="mm-collapse">
                                        @foreach($data['languages'] as $language)
                                            <li>
                                                <a href="{{route('admin.cards.index')}}?lang={{$language->id}}"><i class="fadeIn animated bx bx-radio-circle"></i>{{$language->name}}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>

                                <li>
                                    <a href="{{route('admin.site.pages.index')}}">
                                        <div class="parent-icon">
                                            <i class="lni lni-notepad"></i>
                                        </div>
                                        <div class="menu-title">Страницы</div>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('admin.site.menu-items.index')}}">
                                        <div class="parent-icon">
                                            <i class="lni lni-menu"></i>
                                        </div>
                                        <div class="menu-title">Меню сайта</div>
                                    </a>
                                </li>

                                <li>
                                    <a href="javascript:;" class="has-arrow" aria-expanded="false">
                                        <div class="parent-icon"><i class="lni lni-cog"></i></div>
                                        <div class="menu-title">Настройки</div>
                                    </a>
                                    <ul class="mm-collapse">
                                        <li>
                                            <a href="{{ route('admin.setting.password.edit', 1)  }}"><i class="fadeIn animated bx bx-radio-circle"></i>Сменить пароль</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>



                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 1471px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="height: 531px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </aside>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">
        @yield('content')
    </main>
    <!--end content-->
    <div class="overlay nav-toggle-icon"></div>
</div>
</body>
</html>
