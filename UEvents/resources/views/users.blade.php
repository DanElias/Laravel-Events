@extends('admin')


@section('content')
<!--Modals-->

  <!--INFO MOdal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="eventsModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header formModalHeader">
          <h5 class="modal-title">Información del usuario</h5>
          <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>
        </div>
        <div class="modal-body">
          <p id="username"></p>
          <p id="email"></p>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>

  <!--DELETE Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="deleteUserDialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header formModalHeader">
          <h5 class="modal-title">Eliminar usuario</h5>
          <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/usuariosEliminar">
            <div class="form-group">
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <input type="hidden" name="eventIdD" id="eventIdD" value=""/>
                  </div>
                </div><br/>
                <div class="row">
                  <div class="col-sm">¿Estás seguro de querer eliminar este usuario?</div>
                </div><br/>
                <div class="row">
                  <div class="col-sm">
                    <button class="btn btn-primary btn-block noBorder" type="submit">Eliminar</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--EDIT Modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="addUserDialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header formModalHeader">
        <h5 class="modal-title">Agregar usuario</h5>
        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="/users" >

          {{ csrf_field() }}

          <div class="form-group">
            <div class="container">

              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label" for="nameEvent">Nombre</label>
                  <input class="form-control" type="text" name="nameEvent" id="nameEvent" required="required" placeholder="Conferencia" autofocus="autofocus"/>
                </div>
              </div>

              <div class="row">

                <div class="col-sm">
                  <label class="col-form-label" for="siglasEvent">Siglas</label>
                  <input class="form-control" type="text" name="siglasEvent" id="siglasEvent" required="required" placeholder="MSC" autofocus="autofocus"/>
                </div>

                <div class="col-sm">
                  <label class="col-form-label" for="dateEvent">Fecha</label>
                  <input class="form-control" type="datetime-local" name="dateEvent" id="dateEvent" required="required" autofocus="autofocus"/>
                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label" for="durationEvent">Duración(hrs)</label>
                  <input class="form-control" type="text" name="durationEvent" id="durationEvent" required="required" placeholder="2" autofocus="autofocus"/>
                </div>

                <div class="col-sm">
                  <label class="col-form-label" for="asistantsEvent">Límite asistentes</label>
                  <input class="form-control" type="text" name="asistantsEvent" id="asistantsEvent" required="required" placeholder="100" autofocus="autofocus"/>
                </div>

                <div class="col-sm">
                  <label class="col-form-label" for="costEvent">Costo(MXN)</label>
                  <input class="form-control" type="text" name="costEvent" id="costEvent" required="required" placeholder="250" autofocus="autofocus"/>
                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label" for="locationEvent">Lugar</label>
                  <input class="form-control" type="text" name="locationEvent" id="locationEvent" required="required" placeholder="ITESM Qro." autofocus="autofocus"/>
                </div>
              </div>

              <div class="row">
                <div class="col-sm">
                  <label class="col-form-label" for="descriptionEvent">Decripción</label>
                  <input class="form-control" type="text" name="descriptionEvent" id="descriptionEvent" required="required" placeholder="Conferencia sobre Inteligencia Artificial" autofocus="autofocus"/>
                </div>
              </div>

            </div>
          </div><br/>
          <button class="btn btn-primary btn-block noBorder" type="submit">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>



    <!--EDIT Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editUserDialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header formModalHeader">
          <h5 class="modal-title">Editar usuario</h5>
          <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>
        </div>
        <div class="modal-body">

          <form method="POST" action="/users/edit" >

            {{ csrf_field() }}

            <div class="form-group">
              <div class="container">

                <div class="row">
                  <div class="col-sm">
                    <input type="hidden" name="userIdE" id="userIdE" value=""/>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm">
                    <label class="col-form-label" for="nameEventE">Nombre</label>
                    <input class="form-control" type="text" name="nameEventE" id="nameEventE" required="required" autofocus="autofocus"/>
                  </div>
                </div>

                <div class="row">

                  <div class="col-sm">
                    <label class="col-form-label" for="siglasEventE">Siglas</label>
                    <input class="form-control" type="text" name="siglasEventE" id="siglasEventE" required="required" autofocus="autofocus"/>
                  </div>

                  <div class="col-sm">
                    <label class="col-form-label" for="dateEventE">Fecha</label>
                    <input class="form-control" type="datetime-local" name="dateEventE" id="dateEventE" required="required" autofocus="autofocus"/>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm">
                    <label class="col-form-label" for="durationEventE">Duración(hrs)</label>
                    <input class="form-control" type="text" name="durationEventE" id="durationEventE" required="required" autofocus="autofocus"/>
                  </div>

                  <div class="col-sm">
                    <label class="col-form-label" for="asistantsEventE">Límite asistentes</label>
                    <input class="form-control" type="text" name="asistantsEventE" id="asistantsEventE" required="required" autofocus="autofocus"/>
                  </div>

                  <div class="col-sm">
                    <label class="col-form-label" for="costEventE">Costo(MXN)</label>
                    <input class="form-control" type="text" name="costEventE" id="costEventE" required="required" autofocus="autofocus"/>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm">
                    <label class="col-form-label" for="locationEventE">Lugar</label>
                    <input class="form-control" type="text" name="locationEventE" id="locationEventE" required="required" autofocus="autofocus"/>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm">
                    <label class="col-form-label" for="descriptionEventE">Decripción</label>
                    <input class="form-control" type="text" name="descriptionEventE" id="descriptionEventE" required="required" autofocus="autofocus"/>
                  </div>
                </div>

              </div>
            </div><br/>
            <button class="btn btn-primary btn-block noBorder" type="submit">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- EVENTS content-->
  <div class="text-center contentAdmin">

    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h1 class="pull-left sectionHeader"><i class="material-icons align-bottom"> </i> Usuarios</h1>
        </div>
        <div class="col-sm"></div>
        <div class="col-sm">
          <button class="btn btn-primary btn-lg noBorder" type="button" data-toggle="modal" data-target="#addUserDialog">
            <i class="material-icons align-bottom">add </i> Agregar usuario</button>
        </div>
      </div>
    </div>

    <div class="text-center table-responsive" id="dataTableDiv">
      <table class="table" id="my_pagination_table">
        <thead>
          <tr>
            <th scope="col" style="display:none;">IdUsuario</th>
            <th scope="col">Nombre de Usuario<img src="/images/sort.png"/> </th>
            <th scope="col">Email<img src="/images/sort.png"/></th>
            <th scope="col">Rol<img src="/images/sort.png"/></th>
            <th scope="col">Información</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>

        <tbody>
              @foreach($options as $object)
              <tr>
                <td style="display:none;">{{ $object->id }}</td>
                <td>{{ $object->username }}</td>
                <td>{{ $object->email }}</td>
                <td>{{ $object->role }}</td>
                <td>
                  <a class="btn btn-medium modal-trigger" href="javascript:void(0);" onclick="showUser('{{ $object->id }}')">
                      <i class="material-icons colorBlue">more_horiz</i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-medium modal-trigger" href="javascript:void(0);" onclick="editUser('{{ $object->id }}')">
                      <i class="material-icons colorOrange">edit</i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-medium modal-trigger" href="javascript:void(0);" onclick="deleteUser('{{ $object->id }}')">
                      <i class="material-icons colorRed">delete</i>
                  </a>
                </td>
              </tr>
              @endforeach
        </tbody>

      </table>
    </div>
  </div>

  @if($error)
    <script>
        const modalError = $('#errorDialog');
        modalError.modal('show');
    </script>
  @endif

  @if($success)
    <script>
          const modalSuccess = $('#successDialog');
          modalSuccess.modal('show');
    </script>
  @endif

@endsection
