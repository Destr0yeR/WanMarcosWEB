@extends('layouts.base')

@section('extra_css')
    <link rel="stylesheet" href="{{ asset('/js/lib/leaflet/leaflet.css') }}" />
@stop

@section('content')
    <form method="POST" action="{{ route('degrees.update', $degree->id) }}">
        <div class="row">
            <div class="col-md-12">
                <div class="top-title">
                    <div class="row">
                        <h1>
                            <div class="col-sm-8">
                                Editar Carrera
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">
                                    Gaurdar Cambios
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
                    <input class="form-control" type="text" name="name" value="{{ $degree->name }}" required>
                </div>
                <div class="form-group">
                    <label>Facultad</label>
                    <select name="faculty_id" class="form-control">
                        @foreach($faculties as $id => $name)
                            @if($degree->faculty->id == $id)
                                <option value="{{ $id }}" selected>{{ $name }}</option>
                            @else
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
@stop