@extends('layouts.base')

@section('content')

    <div class="top-title">
        <div class="row">
            <h1>
                <div class="col-sm-8">
                    CATEGORÍAS
                </div>
                <div class="col-sm-4">
                    <a href={{route('categories.create')}} class="btn btn-success">
                        Registrar Nueva Categoría
                    </a>
                </div>
            </h1>
        </div>
    </div>

    <div id="ajax-table">
    @include('categories.list')
    </div>

@stop