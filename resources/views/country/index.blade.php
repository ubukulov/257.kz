@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('countries') !!}
    @foreach($countries as $country)
    <div class="country">
        <h2><a href="{{ $country->url() }}">{{ $country->title }}</a></h2>
        <div class="country_desc">
            {!! $country->short_description !!}
        </div>
    </div>
    @endforeach
@stop