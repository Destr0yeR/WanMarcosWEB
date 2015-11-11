<table class="table table-striped responsive">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($places as $place)
                <tr>
                    <td></td>
                    <td>{{ $place->name }}</td>
                    <td>{{ $place->latitude }}</td>
                    <td>{{ $place->longitude }}</td>
                    <td>
                    <a href="{{ route('places.show', $place->id) }}" class="btn btn-primary">Ver detalle</a>
                    </td>
                    <td>  
                        <a id="delete {{$place->id}}"class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$place->id}}" href="">Eliminar</a>
                    </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$place->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Confirmar Eliminación</h4>
                      </div>
                      <div class="modal-body">
                        <p>¿Está seguro de eliminar este lugar?
                        </p>
                      </div>         
                      <div class="modal-footer">
                        <form method="post" action={{route('places.destroy', $place->id)}}>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cerrar</button>
                            <button type="submit" class="btn btn-danger">Sí, Eliminar lugar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {!! $places->render() !!}
