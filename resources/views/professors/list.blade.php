<table class="table table-striped responsive">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($professors as $professor)
                <tr>
                    <td></td>
                    <td>{{$professor->first_name}}</td>
                    <td>{{$professor->last_name}}</td>
                    <td>{{$professor->email }}</td>
                    <td>
                    <a href="{{ route('professors.show', $professor->id) }}" class="btn btn-primary">Ver detalle</a>
                    </td>
                    <td>  
                        <a id="delete {{$professor->id}}"class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$professor->id}}" href="">Eliminar</a>
                    </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$professor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Confirmar Eliminación</h4>
                      </div>
                      <div class="modal-body">
                        <p>¿Está seguro de eliminar este docente?
                        </p>
                      </div>         
                      <div class="modal-footer">
                        <form method="post" action={{route('professors.destroy', $professor->id)}}>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cerrar</button>
                            <button type="submit" class="btn btn-danger">Sí, Eliminar docente</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {!! $professors->render() !!}
