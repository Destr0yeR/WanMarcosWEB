@extends('layouts.base')

@section('content')

    <div class="top-title">
        <div class="row">
            <h1>
                <div class="col-sm-8">
                    EVENTOS
                </div>
                <div class="col-sm-4">
                    <a href={{route('events.create')}} class="btn btn-success">
                        Registrar Nuevo Evento
                    </a>
                </div>
            </h1>
        </div>
    </div>

    <div id="ajax-table">
    @include('events.list')
    </div>

@stop