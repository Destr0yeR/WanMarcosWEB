@extends('layouts.base')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <div class="row">
                    <h1>
                        <div class="col-sm-8">
                            Detalle de Categoría
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-lg">
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
                <input class="form-control" type="text" name="name" value="{{ $category->name }}" readonly>
            </div>
            <div class="form-group">
                <label>Imagen</label>
            </div>
            <div class="form-group">
                <img src="{{ asset($category->default_image_url) }}">
            </div>
        </div>
    </div>
@stop

@section('extra_head_js')
    <script src="{{ URL::asset('js/jquery.datetimepicker.min.js')}}"></script>
@stop