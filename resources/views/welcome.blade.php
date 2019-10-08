@extends('layouts.app')
@section('content')
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

    <hot-component :tours="{{ $hotTours }}" :tour-cities="{{ json_encode($arr_cities) }}" :currency="{{ $currency }}" :selected-currency="selectedCurrency"></hot-component>

    @include('partials.our_advantages')

{{--    @include('partials.reviews')--}}
@stop