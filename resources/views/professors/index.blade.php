@extends('layouts.base')

@section('content')

    <div class="top-title">
        <div class="row">
            <h1>
                <div class="col-sm-8">
                    Docentes
                </div>
                <div class="col-sm-4">
                    <a href={{route('professors.create')}} class="btn btn-success">
                        Registrar Docente
                    </a>
                </div>
            </h1>
        </div>
    </div>

    <div id="map"></div>
    <div id="ajax-table">
    @include('professors.list')
    </div>

@stop