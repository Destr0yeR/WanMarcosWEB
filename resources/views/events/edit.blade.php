@extends('layouts.base')

@section('content')
    <form role="form" accept=".pdf, image/*" enctype="application/x-www-form-urlencoded" autocomplete="off" action="{{ route('events.update', $event->id) }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <div class="top-title">
                    <div class="row">
                        <h1>
                            <div class="col-sm-8">
                                Detalle de Evento
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Save Changes
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
                    <input class="form-control" type="text" name="name" value="{{ $event->name }}">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" rows="10" cols="80" name="description">{{ $event->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Lugar</label>
                    <select name="place_id" class="form-control">
                        @if($event->place) 
                            <option value="0">Seleccione una opción</option> 
                        @else
                            <option value="0" selected>Seleccione una opción</option>
                        @endif
                        @foreach($places as $id => $name)
                            @if($event->place_id == $id)
                                <option value="$id" selected>$name</option>
                            @else
                                <option value="$id">$name</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Categoría</label>
                    <select name="category_id" class="form-control">
                        @if($event->category) 
                            <option value="0">Seleccione una opción</option> 
                        @else
                            <option value="0" selected>Seleccione una opción</option>
                        @endif
                        @foreach($places as $id => $name)
                            @if($event->category_id == $id)
                                <option value="$id" selected>$name</option>
                            @else
                                <option value="$id">$name</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Fecha de Inicio</label>
                    <input class="form-control" type="date" name="starts_at_date" value="{{ $date_time_service->convertDate($event->starts_at)->toDateString() }}">
                </div>
                <div class="form-group">
                    <label>Hora de Inicio</label>
                    <input class="form-control" type="time" name="starts_at_time" value="{{ $date_time_service->convertDate($event->starts_at)->toTimeString() }}">
                </div>
                <div class="form-group">
                    <label>Fecha de Fin</label>
                    <input class="form-control" type="date" name="ends_at_date" value="{{ $date_time_service->convertDate($event->ends_at)->toDateString() }}">
                </div>
                <div class="form-group">
                    <label>Hora de Fin</label>
                    <input class="form-control" type="time" name="ends_at_time" value="{{ $date_time_service->convertDate($event->ends_at)->toTimeString() }}">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input class="form-control" type="text" name="website" value="{{ $event->website }}">
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
    </form>
@stop

@section('extra_head_js')
    <script src="{{ URL::asset('js/jquery.datetimepicker.min.js')}}"></script>
@stop