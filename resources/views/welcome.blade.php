<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Туристическое агентство в Алматы - Турфирма 257 в Казахстане</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick-theme.min.css') }}">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                    <img width="80" src="{{ asset('img/257.png') }}" alt="257">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Горящие туры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Открыть агентство</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Страны
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Туры
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Отели</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Круизы</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                О нас
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Контакты</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>

            <div class="header" data-vide-bg="/video/header">
                <div class="header_wrap">
                    <div class="header_content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Весь мир на одном сайте</h1>
                                    <h2>Мы находим горящие туры, а вам остается их
                                        только купить!</h2>

                                    <div class="header_btns">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary pick_me_tour" type="button">Подберите мне тур</button>

                                                <button type="button" class="btn btn-danger">Туры в рассрочку</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hot-component :tours="{{ $hotTours }}"></hot-component>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('js/jquery.vide.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <script>
            $('.hot_tours_slider').slick({
                autoplay: false,
                arrows : true,
                dots : false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4
            });
        </script>
    </body>
</html>
