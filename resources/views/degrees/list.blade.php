<table class="table table-striped responsive">
        <thead>
            <tr>
                <th>Carrera</th>
                <th>Facultad</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($degrees as $degree)
                <tr>
                    <td>{{$degree->name}}</td>
                    <td>{{$degree->faculty->name}}</td>
                    <td>
                    <a href="{{ route('degrees.show', $degree->id) }}" class="btn btn-primary">Ver detalle</a>
                    </td>
                    <td>  
                        <a id="delete {{$degree->id}}"class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$degree->id}}" href="">Eliminar</a>
                    </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$degree->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Confirmar Eliminación</h4>
                      </div>
                      <div class="modal-body">
                        <p>¿Está seguro de eliminar esta carrera?
                        </p>
                      </div>         
                      <div class="modal-footer">
                        <form method="post" action={{route('degrees.destroy', $degree->id)}}>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cerrar</button>
                            <button type="submit" class="btn btn-danger">Sí, Eliminar carrera</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {!! $degrees->render() !!}
