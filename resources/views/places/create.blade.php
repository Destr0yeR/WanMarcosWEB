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
                            <a href={{route('places.index')}} class="btn btn-primary">
                                Atrás
                            </a>
                        </div>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form accept="image/*" enctype="multipart/form-data" autocomplete="off" action="{{ route('places.store') }}" method="POST">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                </div>
            </div>
            <div class="col-md-9">
                <div class="col-md-12">
                    <div id="map"></div>
                    <input type="hidden" name="latitude" id="latitude" value="{!!old('latitude')!!}">
                    <input type="hidden" name="longitude" id="longitude" value="{!!old('longitude')!!}">
                </div>
                <div class="form-group">
                    <label>Imagen</label>
                    <input class="file" type="file" accept="image/*" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
            </form>
            </div>
        </form>
    </div>
@stop

@section('extra_head_js')
    <script src="{{ asset('js/lib/leaflet/leaflet.js') }}"></script>
@stop

@section('extra_footer_js')
    <script src="{{ asset('js/map.js') }}"></script>
@stop