@extends('layouts.app')
@section('content')

    @include('partials.trip_hacker')

    <hot-component :tour-cities="{{ json_encode($arr_cities) }}" :currency="{{ $currency }}" :selected-currency="{{ $selected_currency }}" :currencies="{{ json_encode($currencies) }}"></hot-component>

    @include('partials.our_advantages')
    @include('partials.our_partners')

    <div class="our_franchises">
        <h3>Наши офисы</h3>
        <div class="row">
            @each('partials.our_franchises', $franchises, 'franchise')
        </div>
    </div>

{{--    @include('partials.reviews')--}}
@stop