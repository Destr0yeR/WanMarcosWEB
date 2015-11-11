@extends('layouts.base')

@section('content')
    <form method="POST" action="{{ route('professors.update', $professor->id) }}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
                <div class="top-title">
                    <div class="row">
                        <h1>
                            <div class="col-sm-8">
                                Detalle de Docente
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary btn-lg">
                                    Guardar Cambios
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
                    <label>Nombres</label>
                    <input class="form-control" type="text" name="first_name" value="{{ $professor->first_name }}">
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input class="form-control" type="text" name="last_name" value="{{ $professor->last_name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ $professor->email }}">
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