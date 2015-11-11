@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="top-title">
                    <div class="row">
                        <h1>
                            <div class="col-sm-8">
                                Detalle de Categoría
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary btn-lg">
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
                    <input class="form-control" type="text" name="name" value="{{ $category->name }}" required>
                </div>
                <div class="form-group">
                    <label>Imagen</label>
                    <input class="file" type="file" accept="image/*" name="image">
                </div>
            </div>
        </div>
    </form>
@stop

@section('extra_head_js')
    <script src="{{ URL::asset('js/jquery.datetimepicker.min.js')}}"></script>
@stop