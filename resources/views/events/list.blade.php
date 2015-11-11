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
                        @if($event->user) 
                          <a class="btn btn-default" data-toggle="modal" data-target="#contactModal{{$event->id}}"> Contactar </a> 
                        @else
                          <a class="btn btn-default disabled" > No disponible </a> 
                        @endif
                    </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Confirmar Rechazo</h4>
                      </div>
                      <div class="modal-body">
                        <p>¿Está seguro de rechazar este evento?
                        </p>
                      </div>         
                      <div class="modal-footer">
                        <form method="post" action={{route('events.destroy', $event->id)}}>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cerrar</button>
                            <button type="submit" class="btn btn-danger">Sí, Rechazar evento</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="contactModal{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form method="post" action="{{route('events.contact', $event->id)}}" id="contact{{$event->id}}">
                        <div class="modal-header">
                          <h4 class="modal-title">Contactar</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                              <label>Mensaje</label>
                              <textarea class="form-control" name="message" required></textarea>
                          </div>
                        </div>         
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-danger" id="send-contact{{$event->id}}">Enviar</button>                      
                        </div>
                      </form>
                      <script type="text/javascript">
                        $("#contact{{$event->id}}").submit(function () {
                            $("#send-contact{{$event->id}}").attr("disabled", true);
                            return true;
                        });
                      </script>
                    </div>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {!! $events->render() !!}
