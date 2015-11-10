@extends('layouts.base')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="top-title">
                <div class="row">
                    <h1>
                        <div class="col-sm-8">
                            Detalle de Evento
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-lg">
                                Edit
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
                <input class="form-control" type="text" name="name" value="{{ $event->name }}" readonly>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control" rows="10" cols="80" name="description" readonly>{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Lugar</label>
                <input type="text" name="place_id" class="form-control" value="@if($event->place) {{$event->place->name}} @else - @endif" readonly>
            </div>
            <div class="form-group">
                <label>Categoría</label>
                <input type="text" name="category_id" class="form-control" value="@if($event->category) {{$event->category->name}} @else - @endif" readonly>
            </div>
            <div class="form-group">
                <label>Fecha de Inicio</label>
                <input class="form-control" type="date" name="starts_at_date" value="{{ $date_time_service->convertDate($event->starts_at)->toDateString() }}" readonly>
            </div>
            <div class="form-group">
                <label>Hora de Inicio</label>
                <input class="form-control" type="time" name="starts_at_time" value="{{ $date_time_service->convertDate($event->starts_at)->toTimeString() }}" readonly>
            </div>
            <div class="form-group">
                <label>Fecha de Fin</label>
                <input class="form-control" type="date" name="ends_at_date" value="{{ $date_time_service->convertDate($event->ends_at)->toDateString() }}" readonly>
            </div>
            <div class="form-group">
                <label>Hora de Fin</label>
                <input class="form-control" type="time" name="ends_at_time" value="{{ $date_time_service->convertDate($event->ends_at)->toTimeString() }}" readonly>
            </div>
            <div class="form-group">
                <label>Website</label>
                <input class="form-control" type="text" name="website" value="{{ $event->website }}" readonly>
            </div>
            <div class="form-group">
                <label>Imagen</label>
                @if($event->image){{ asset($event->image) }} @else Not Found @endif
            </div>
            <div class="form-group">
                <label>Información extra</label>
                @if($event->information){{ asset($event->information) }} @else Not Found @endif
            </div>
        </div>
    </div>
@stop

@section('extra_head_js')
    <script src="{{ URL::asset('js/jquery.datetimepicker.min.js')}}"></script>
@stop