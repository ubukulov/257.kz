@extends('layouts.app')
@section('content')

    <review :cities="{{ $cities }}" :countries="{{ json_encode($countries) }}"></review>
@stop