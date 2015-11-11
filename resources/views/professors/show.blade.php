@extends('layouts.base')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <div class="row">
                    <h1>
                        <div class="col-sm-8">
                            Detalle de Docente
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-primary btn-lg">
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
                <label>Nombres</label>
                <input class="form-control" type="text" name="first_name" value="{{ $professor->first_name }}" readonly>
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                <input class="form-control" type="text" name="last_name" value="{{ $professor->last_name }}" readonly>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email" value="{{ $professor->email }}" readonly>
            </div>
            <div class="form-group">
                <label>Imagen</label>
            </div>
            <div class="form-group">
                <img src="{{ asset($professor->image) }}">
            </div>
        </div>
    </div>
@stop

@section('extra_head_js')
    <script src="{{ URL::asset('js/jquery.datetimepicker.min.js')}}"></script>
@stop