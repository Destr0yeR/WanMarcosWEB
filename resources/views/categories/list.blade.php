<table class="table table-striped responsive">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td></td>
                    <td>{{$category->name}}</td>
                    <td>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Ver detalle</a>
                    </td>
                    <td>  
                        <a id="delete {{$category->id}}"class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$category->id}}" href="">Rechazar</a>
                    </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <form method="post" action={{route('categories.destroy', $category->id)}}>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cerrar</button>
                            <button type="submit" class="btn btn-danger">Sí, Rechazar evento</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>

    {!! $categories->render() !!}
