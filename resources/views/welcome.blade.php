@extends('layouts.app')
@section('content')

    <hot-component :tours="{{ $hotTours }}" :tour-cities="{{ json_encode($arr_cities) }}" :currency="{{ $currency }}" :selected-currency="selectedCurrency"></hot-component>

    @include('partials.our_advantages')
    @include('partials.our_partners')

{{--    @include('partials.reviews')--}}
@stop