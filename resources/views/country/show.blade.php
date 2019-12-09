@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('country.show', $country) !!}
    <div class="country_view">
        <h1>{{ $country->title }}</h1>
        <div class="country_text">
            {!! $country->full_description !!}
        </div>
    </div>
@stop