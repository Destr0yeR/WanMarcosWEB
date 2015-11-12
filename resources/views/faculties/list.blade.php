<table class="table table-striped responsive">
        <thead>
            <tr>
                <th>Nombre</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($faculties as $faculty)
                <tr>
                    <td>{{$faculty->name}}</td>
                    <td>
                    <a href="{{ route('faculties.show', $faculty->id) }}" class="btn btn-primary">Ver detalle</a>
                    </td>
                    <td>  
                        <a id="delete {{$faculty->id}}"class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$faculty->id}}" href="">Eliminar</a>
                    </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$faculty->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Confirmar Eliminación</h4>
                      </div>
                      <div class="modal-body">
                        <p>¿Está seguro de eliminar esta facultad?
                        </p>
                      </div>         
                      <div class="modal-footer">
                        <form method="post" action={{route('faculties.destroy', $faculty->id)}}>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cerrar</button>
                            <button type="submit" class="btn btn-danger">Sí, Eliminar facultad</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {!! $faculties->render() !!}
