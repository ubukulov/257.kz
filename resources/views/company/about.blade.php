@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('company.show', $page) !!}
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $page->title }}</h1>

            <div class="page_desc">
                {!! $page->full_description !!}
            </div>
        </div>
    </div>
@stop