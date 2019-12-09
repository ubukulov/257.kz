@extends('layouts.app')
@section('content')
    <h1>Контакты</h1>

    <h2>Центральный офис</h2>
    <p>Call Center: +7 747 257 00 00</p>

    <div class="our_franchises">
        <h3>Наши офисы</h3>
        <div class="row">
            @each('partials.our_franchises', $franchises, 'franchise')
        </div>
    </div>
@stop