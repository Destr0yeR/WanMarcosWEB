@extends('layouts.base')

@section('content')

    <div class="top-title">
        <div class="row">
            <h1>
                <div class="col-sm-8">
                    Sugerencias
                </div>
            </h1>
        </div>
    </div>
    <div id="ajax-table">
        @include('suggestions.list')
    </div>

@stop