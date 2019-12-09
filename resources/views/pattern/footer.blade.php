<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="f_logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/257.png') }}" alt="">
                    </a>
                </div>

                <div class="f_copy">
                    <p>&copy; Сеть турагенств 257 <br> Все права защищены 2019</p>
                </div>
            </div>
            <div class="col-md-10">
                <div class="footer_m">
                    <ul class="footer_menu">
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li><a href="{{ route('about.company') }}">О нас</a></li>
                        <li><a href="{{ route('contacts') }}">Контакты</a></li>
                        {{--<li><a href="#">Конфиденциальность</a></li>--}}
                        {{--<li><a href="#">Онлайн оплата</a></li>--}}
                        <li><a href="{{ route('countries') }}">Страны</a></li>
                        {{--<li><a href="#">Туры</a></li>--}}
                        <li><a href="{{ route('franchising-terms') }}">Открыть агенство</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>