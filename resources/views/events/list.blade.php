<table class="table table-striped responsive">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Lugar</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td></td>
                    <td>{{$event->name}}</td>
                    <td>{{ $date_time_service->convertDateString($event->starts_at) }}</td>
                    <td>{{ $date_time_service->convertDateString($event->ends_at) }}</td>
                    <td>@if($event->place) {{$event->place->name}} @else - @endif</td>
                    <td><a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Ver detalle</a></td>
                    <td>
                        <a href="{{ route('events.accept', $event->id) }}" class="btn btn-success"> Aceptar</a>
                    </td>
                    <td>  
                        <a id="delete {{$event->id}}"class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$event->id}}" href="">Rechazar</a>
                    </td>
                    <td>
                        <a class="btn btn-default"> Contactar </a>
                    </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close-modal-button" data-dismiss="modal" aria-label="Close">
                            <img src="{{url('/').'/img/signusup-close.png'}}" id="close-modal-button-img">
                        </button>
                        <h4 class="modal-title" id="myModalLabel">CONFIRM DELETE</h4>
                      </div>
                      <div class="modal-footer">
                        <form method="post" action={{route('events.destroy', $event->id)}}>
                            <button type="button" class="cancel-button-delete-modal" data-dismiss="modal">NO, CANCEL DELETE</button>
                            <button type="submit" class="confirm-button-delete-modal">YES, DELETE EVENT</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {!! $events->render() !!}
