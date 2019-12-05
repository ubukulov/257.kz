@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('hot.show', $title) !!}
    <hot-tours v-bind:hottours="{{ $hotTours }}"></hot-tours>
@stop