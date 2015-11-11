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
                            Registrar Lugar
                        </div>
                        <div class="col-sm-4">
                            <a href={{route('places.edit', $place->id)}} class="btn btn-primary">
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
                <input class="form-control" type="text" name="name" value="{{ $place->name }}" readonly>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <div id="map"></div>
                <input type="hidden" name="latitude" id="latitude" value="{{ $place->latitude }}">
                <input type="hidden" name="longitude" id="longitude" value="{{ $place->longitude }}">
            </div>
            <div class="form-group">
                <label>Imagen</label>
            </div>
            <div class="form-group">
                <img src="{{ asset($place->image) }}">
            </div>
        </form>
        </div>
    </div>
@stop

@section('extra_head_js')
    <script src="{{ asset('js/lib/leaflet/leaflet.js') }}"></script>
@stop

@section('extra_footer_js')
    <script src="{{ asset('js/map.js') }}"></script>
@stop