@extends('admin')


@section('content')
<!--Modals-->

<!--  Error handle -->
    @if($errors->any())
            @foreach($errors->all() as $error)
            @endforeach
    @endif

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

          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

              <div class="col-md-6">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                  @error('username')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="role" class="col-md-4 col-form-label text-md-right">Rol</label>

              <div class="col-md-6">
                  <select name="role" class="form-control" >
                      <option value="user">User</option>
                      <option value="staff">Staff</option>
                      <option value="admin">Admin</option>
                  </select>
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
          </div>
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
          </tr>
        </thead>

        <tbody>
              @foreach($options as $object)
              <tr>
                <td style="display:none;">{{ $object->id }}</td>
                <td>{{ $object->username }}</td>
                <td>{{ $object->email }}</td>
                <td>{{ $object->role }}</td>
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
