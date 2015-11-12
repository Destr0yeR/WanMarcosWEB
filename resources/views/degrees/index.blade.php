@extends('layouts.base')

@section('content')

    <div class="top-title">
        <div class="row">
            <h1>
                <div class="col-sm-8">
                    Carrera
                </div>
                <div class="col-sm-4">
                    <a href={{route('degrees.create')}} class="btn btn-success">
                        Registrar Carrera
                    </a>
                </div>
            </h1>
        </div>
    </div>
    <div id="ajax-table">
    @include('degrees.list')
    </div>

@stop