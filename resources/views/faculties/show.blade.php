@extends('layouts.base')

@section('extra_css')
    <link rel="stylesheet" href="{{ asset('/js/lib/leaflet/leaflet.css') }}" />
@stop

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <div class="row">
                    <h1>
                        <div class="col-sm-8">
                            Detalle de Facultad
                        </div>
                        <div class="col-sm-4">
                            <a href={{route('faculties.edit', $faculty->id)}} class="btn btn-primary">
                                Editar
                            </a>
                        </div>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control" type="text" name="name" value="{{ $faculty->name }}" readonly>
            </div>
        </div>
    </div>
@stop