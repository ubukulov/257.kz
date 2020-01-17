<div class="nav-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img width="80" src="{{ asset('img/257.png') }}" alt="257">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Горящие туры
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('hot.almaty') }}">Алматы</a>
                        <a class="dropdown-item" href="{{ route('hot.nur-sultan') }}">Нур-Султан (Астана)</a>
                        <a class="dropdown-item" href="{{ route('hot.aktobe') }}">Актобе</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('service.index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Услуги
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('service.aviabilety') }}">Авиабилеты</a>
                        <a class="dropdown-item" href="{{ route('service.bonus') }}">Бонусная карта</a>
                        <a class="dropdown-item" href="{{ route('service.strahovanie') }}">Страхование</a>
                        <a class="dropdown-item" href="{{ route('service.rassrochka') }}">Рассрочка</a>
                        <a class="dropdown-item" href="{{ route('service.closed') }}">Ограничение на выезд</a>
                        <a class="dropdown-item" href="{{ route('service.pay') }}">Способ оплаты</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Открыть агентство
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('franchising-terms') }}">Условия франчайзинга</a>
                        <a class="dropdown-item" href="https://afinadb.kz/" target="_blank">Вход для франчайзинга</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Страны
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($countries as $index=>$country)
                            @if($index < 5)
                                <a class="dropdown-item" href="{{ $country->url() }}">
                                    <img width="25" src="{{ $country->flag() }}" alt="{{ $country->title }}">&nbsp;{{ $country->title }}
                                </a>
                            @endif
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('countries') }}">Все страны</a>
                    </div>
                </li>
                {{--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Туры
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">из Алматы</a>
                        <a class="dropdown-item" href="#">из Нур-Султана (Астаны)</a>
                        <a class="dropdown-item" href="#">из Актобе</a>
                    </div>
                </li>--}}
                {{--<li class="nav-item">
                    <a class="nav-link" href="#">Отели</a>
                </li>--}}
                {{--<li class="nav-item">
                    <a class="nav-link" href="#">Круизы</a>
                </li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Компания
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('about.company') }}">О нас</a>
                        <a class="dropdown-item" href="{{ route('contacts') }}">Контакты</a>
                        <a class="dropdown-item" href="{{ route('review.index') }}">Отзывы клиентов</a>
                        {{--<a class="dropdown-item" href="#">Сотрудники компании</a>
                        <a class="dropdown-item" href="#">Наши партнеры</a>
                        <a class="dropdown-item" href="#">Наши преимущества</a>

                        <a class="dropdown-item" href="#">Как заказать тур</a>--}}
                    </div>
                </li>
                {{--<li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>--}}
            </ul>

            <currency :currency="{{ $selected_currency }}" :currencies="{{ json_encode($currencies) }}"></currency>

            <city-component :cities="{{$cities}}" :city="{{ $selected_city }}"></city-component>
        </div>
    </nav>
</div>