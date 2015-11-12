@extends('layouts.base')

@section('content')

    <div class="top-title">
        <div class="row">
            <h1>
                <div class="col-sm-8">
                    Facultades
                </div>
                <div class="col-sm-4">
                    <a href={{route('faculties.create')}} class="btn btn-success">
                        Registrar Facultad
                    </a>
                </div>
            </h1>
        </div>
    </div>
    <div id="ajax-table">
    @include('faculties.list')
    </div>

@stop