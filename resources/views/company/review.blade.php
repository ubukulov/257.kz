@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('company.show', null, 'Отзывы туристов') !!}
    <div class="row">
        <div class="col-md-8">
            <h1>Отзывы туристов</h1>

            <div class="page_desc">
                <review :cities="{{ $cities }}" :countries="{{ json_encode($countries) }}"></review>
            </div>
        </div>

        <div class="col-md-4"></div>
    </div>
@stop