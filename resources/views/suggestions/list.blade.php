<table class="table table-striped responsive">
        <thead>
            <tr>
                <th>Mensaje</th>
                <th>Usuario</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($suggestions as $suggestion)
                <tr>
                    <td>{{$suggestion->message}}</td>
                    <td>
                        {{$suggestion->user->email}} <br>
                        {{$suggestion->user->first_name}} {{$suggestion->user->last_name}}
                    </td>
                    <td>
                    <a href="{{ route('faculties.show', $suggestion->id) }}" class="btn btn-primary">Ver detalle</a>
                    </td>
                    <td>  
                        <a id="delete {{$suggestion->id}}"class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$suggestion->id}}" href="">Eliminar</a>
                    </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$suggestion->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Confirmar Eliminación</h4>
                      </div>
                      <div class="modal-body">
                        <p>¿Está seguro de eliminar esta sugerencia?
                        </p>
                      </div>         
                      <div class="modal-footer">
                        <form method="post" action={{route('suggestions.destroy', $suggestion->id)}}>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cerrar</button>
                            <button type="submit" class="btn btn-danger">Sí, Eliminar sugerencia</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {!! $suggestions->render() !!}
