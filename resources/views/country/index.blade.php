@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('countries') !!}
    <div class="title mb-4">
        <h1>Страны</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            @foreach($countries as $country)
                <div class="country mb-4">
                    <div class="country_header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="country_flag">
                                    <a href="{{ $country->url() }}"><img width="50" src="{{ $country->flag() }}" alt="{{ $country->title }}"> &nbsp;&nbsp; {{ $country->title }}</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="country_menu text-right">
                                    <a href="#">Туры</a>
                                    <a href="#">Курорты</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="country_desc">
                        {!! $country->short_description !!}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4"></div>
    </div>
@stop