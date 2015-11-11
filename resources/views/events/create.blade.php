@extends('layouts.base')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <div class="row">
                    <h1>
                        <div class="col-sm-8">
                            Crear Evento
                        </div>
                        <div class="col-sm-4">
                            <a href={{route('events.index')}} class="btn btn-primary">
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
            <form role="form" accept=".pdf, image/*" enctype="application/x-www-form-urlencoded" autocomplete="off" action="{{ route('events.store') }}" method="POST">
                <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" rows="10" cols="80" name="description">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Lugar</label>
                    <select name="place_id" class="form-control">
                        <option value="0">Seleccione una opción</option>
                        @foreach($places as $id => $name)
                        <option value="$id">$name</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Categoría</label>
                    <select name="category_id" class="form-control">
                        <option value="0">Seleccione una opción</option>
                        @foreach($categories as $id => $name)
                        <option value="$id">$name</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Fecha de Inicio</label>
                    <input class="form-control" type="date" name="starts_at_date">
                </div>
                <div class="form-group">
                    <label>Hora de Inicio</label>
                    <input class="form-control" type="time" name="starts_at_time">
                </div>
                <div class="form-group">
                    <label>Fecha de Fin</label>
                    <input class="form-control" type="date" name="ends_at_date">
                </div>
                <div class="form-group">
                    <label>Hora de Fin</label>
                    <input class="form-control" type="time" name="ends_at_time">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input class="form-control" type="text" name="website">
                </div>
                <div class="form-group">
                    <label>Imagen</label>
                    <input class="file" type="file" accept="image/*" name="image">
                </div>
                <div class="form-group">
                    <label>Información extra</label>
                    <input class="file" type="file" accept=".pdf, image/*" name="information">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Crear</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $.datetimepicker.setLocale('en');
    </script>
@stop

@section('extra_head_js')
    <script src="{{ URL::asset('js/jquery.datetimepicker.min.js')}}"></script>
@stop