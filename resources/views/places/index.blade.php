@extends('layouts.base')

@section('content')

    <div class="top-title">
        <div class="row">
            <h1>
                <div class="col-sm-8">
                    Lugares
                </div>
                <div class="col-sm-4">
                    <a href={{route('places.create')}} class="btn btn-success">
                        Registrar Lugar
                    </a>
                </div>
            </h1>
        </div>
    </div>
    <div id="ajax-table">
    @include('places.list')
    </div>

@stop