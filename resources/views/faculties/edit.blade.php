@extends('layouts.base')

@section('extra_css')
    <link rel="stylesheet" href="{{ asset('/js/lib/leaflet/leaflet.css') }}" />
@stop

@section('content')
    <form action="{{ route('faculties.update', $faculty->id) }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <div class="top-title">
                    <div class="row">
                        <h1>
                            <div class="col-sm-8">
                                Editar Facultad
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
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
                    <input class="form-control" type="text" name="name" value="{{ $faculty->name }}" required>
                </div>
            </div>
        </div>
    </form>
@stop