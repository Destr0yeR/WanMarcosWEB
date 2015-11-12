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
                            Registrar Facultad
                        </div>
                        <div class="col-sm-4">
                            <a href={{route('faculties.index')}} class="btn btn-primary">
                                Atrás
                            </a>
                        </div>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form accept="image/*" enctype="multipart/form-data" autocomplete="off" action="{{ route('faculties.store') }}" method="POST">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
            </div>
        </form>
    </div>
@stop