@extends('layouts.base')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <div class="row">
                    <h1>
                        <div class="col-sm-8">
                            Crear Categoría
                        </div>
                        <div class="col-sm-4">
                            <a href={{route('categories.index')}} class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form accept="image/*" enctype="multipart/form-data" autocomplete="off" action="{{ route('categories.store') }}" method="POST">
                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label>Imagen</label>
                    <input class="file" type="file" accept="image/*" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Crear</button>
            </form>
        </div>
    </div>
@stop