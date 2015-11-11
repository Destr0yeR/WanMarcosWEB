@extends('layouts.base')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <div class="row">
                    <h1>
                        <div class="col-sm-8">
                            Registrar Docente
                        </div>
                        <div class="col-sm-4">
                            <a href={{route('categories.index')}} class="btn btn-primary">
                                Atrás
                            </a>
                        </div>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form accept="image/*" enctype="multipart/form-data" autocomplete="off" action="{{ route('professors.store') }}" method="POST">
                <div class="form-group">
                    <label>Nombres</label>
                    <input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" required>
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label>Imagen</label>
                    <input class="file" type="file" accept="image/*" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
            </form>
        </div>
    </div>
@stop