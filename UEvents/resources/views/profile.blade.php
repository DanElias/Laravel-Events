@extends('admin')


@section('content')
<!--Modals-->

<!--  Error handle -->
    @if($errors->any())
            @foreach($errors->all() as $error)
            @endforeach
    @endif

  <!-- EVENTS content-->
  <div class=" contentAdmin">

    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h1 class="pull-left sectionHeader"><i class="material-icons align-bottom"> </i> Perfil </h1>
        </div>
      </div>
    </div>

    <form method="POST" action="/profile/edit" >

      {{ csrf_field() }}

      <div class="form-group">
        <div class="container">

          <div class="row">
            <div class="col-sm">
              <input type="hidden" name="userId" id="userId" value="{{ $user->id }}"/>
            </div>
          </div>

          <div class="row">
            <div class="col-sm">
              <label class="col-form-label" for="username">Username</label>
              <input class="form-control" type="text" value="{{ $user->username}}" name="username" id="username" required="required" autofocus="autofocus"/>
            </div>
            <div class="col-sm">
              <label class="col-form-label" for="email">Correo electrónico</label>
              <input class="form-control" type="text" value="{{ $user->email }}" name="email" id="email" required="required" autofocus="autofocus"/>
            </div>
          </div>

          <div class="row">

            <div class="col-sm">
              <label class="col-form-label" for="name">Nombre</label>
              <input class="form-control" type="text" value="{{ $user->nombre }}" name="name" id="name" required="required" autofocus="autofocus"/>
            </div>
            <div class="col-sm">
              <label class="col-form-label" for="sfather">Apellido Paterno</label>
              <input class="form-control" type="text" value="{{ $user->a_paterno }}" name="sfather" id="sfather" required="required" autofocus="autofocus"/>
            </div>
            <div class="col-sm">
              <label class="col-form-label" for="smother">Apellido Materno</label>
              <input class="form-control" type="text" value="{{ $user->a_materno }}" name="smother" id="smother" required="required" autofocus="autofocus"/>
            </div>

          </div>

          <div class="row">
            <div class="col-sm">
              <label class="col-form-label" for="birthday">Fecha de Nacimiento</label>
              <input class="form-control" type="date" value="{{ $user->fecha_nacimiento }}" name="birthday" id="birthday" required="required" autofocus="autofocus"/>
              @if($user->fecha_nacimiento)
                <script>
                    var dateJs = new Date('{{$user->fecha_nacimiento}}');
                    var tzoffset = (new Date()).getTimezoneOffset() * 60000; //offset in milliseconds
                    var fecha = (new Date(dateJs - tzoffset)).toISOString().slice(0, -1);
                    var res = fecha.substring(0, 10);
                    $('#birthday').val(res);
                </script>
              @endif
            </div>
            <div class="col-sm">
              <label class="col-form-label" for="state">Estado</label>
              <select name="state" class="form-control" value="{{ $user->estado }}" id="state">
                      <option value="" selected>Selecciona una opción</option>
                      <option value="Aguascalientes">Aguascalientes</option>
                      <option value="Baja California">Baja California</option>
                      <option value="Baja California Sur">Baja California Sur</option>
                      <option value="Campeche">Campeche</option>
                      <option value="Coahuila">Coahuila</option>
                      <option value="Colima">Colima</option>
                      <option value="Chiapas">Chiapas</option>
                      <option value="Chihuahua">Chihuahua</option>
                      <option value="CDMX">CDMX</option>
                      <option value="Durango">Durango</option>
                      <option value="Guanajuato">Guanajuato</option>
                      <option value="Guerrero">Guerrero</option>
                      <option value="Hidalgo">Hidalgo</option>
                      <option value="Jalisco">Jalisco</option>
                      <option value="Estado de México">Estado de México</option>
                      <option value="Michoacán">Michoacán</option>
                      <option value="Morelos">Morelos</option>
                      <option value="Nayarit">Nayarit</option>
                      <option value="Nuevo León">Nuevo León</option>
                      <option value="Oaxaca">Oaxaca</option>
                      <option value="Puebla">Puebla</option>
                      <option value="Querétaro">Querétaro</option>
                      <option value="Quintana Roo">Quintana Roo</option>
                      <option value="San Luis Potosí">San Luis Potosí</option>
                      <option value="Sinaloa">Sinaloa</option>
                      <option value="Sonora">Sonora</option>
                      <option value="Tabasco">Tabasco</option>
                      <option value="Tamaulipas">Tamaulipas</option>
                      <option value="Tlaxcala">Tlaxcala</option>
                      <option value="Veracruz">Veracruz</option>
                      <option value="Yucatán">Yucatán</option>
                      <option value="Zacatecas">Zacatecas</option>
              </select>
              @switch($user->estado)
                @case('Aguascalientes')
                <script> $('#estate').val("Aguascalientes");</script>
                    @break
                @case('Baja California')
                <script> $('#estate').val("Baja California");</script>
                    @break
                @case('Baja California Sur')
                <script> $('#state').val("Baja California Sur");</script>
                    @break
                @case('Campeche')
                <script> $('#state').val("Campeche");</script>
                    @break
                @case('Coahuila')
                <script> $('#state').val("Coahuila");</script>
                    @break
                @case('Colima')
                <script> $('#state').val("Colima");</script>
                    @break
                @case('Chiapas')
                <script> $('#state').val("Chiapas");</script>
                    @break
                @case('Chihuahua')
                <script> $('#state').val("Chihuahua");</script>
                    @break
                @case('CDMX')
                <script> $('#state').val("CDMX");</script>
                    @break
                @case('Durango')
                <script> $('#state').val("Durango");</script>
                    @break
                @case('Guanajuato')
                <script> $('#state').val("Guanajuato");</script>
                    @break
                @case('Guerrero')
                <script> $('#state').val("Guerrero");</script>
                    @break
                @case('Hidalgo')
                <script> $('#state').val("Hidalgo");</script>
                    @break
                @case('Jalisco')
                <script> $('#state').val("Jalisco");</script>
                    @break
                @case('Estado de México')
                <script> $('#state').val("Estado de México");</script>
                    @break
                @case('Michoacán')
                <script> $('#state').val("Michoacán");</script>
                    @break
                @case('Morelos')
                <script> $('#state').val("Morelos");</script>
                    @break
                @case('Nayarit')
                <script> $('#state').val("Nayarit");</script>
                    @break
                @case('Nuevo León')
                <script> $('#state').val("Nuevo León");</script>
                    @break
                @case('Oaxaca')
                <script> $('#state').val("Oaxaca");</script>
                    @break
                @case('Puebla')
                <script> $('#state').val("Puebla");</script>
                    @break
                @case('Querétaro')
                <script> $('#state').val("Querétaro");</script>
                    @break
                @case('Quintana Roo')
                <script> $('#state').val("Quintana Roo");</script>
                    @break
                @case('San Luis Potosí')
                <script> $('#state').val("San Luis Potosí");</script>
                    @break
                @case('Sinaloa')
                <script> $('state').val("Sinaloa");</script>
                    @break
                @case('Sonora')
                <script> $('#state').val("Sonora");</script>
                    @break
                @case('Tabasco')
                <script> $('#state').val("Tabasco");</script>
                    @break
                @case('Tamaulipas')
                <script> $('#state').val("Tamaulipas");</script>
                    @break
                @case('Tlaxcala')
                <script> $('#state').val("Tlaxcala");</script>
                    @break
                @case('Veracruz')
                <script> $('#state').val("Veracruz");</script>
                    @break
                @case('Yucatán')
                <script> $('#state').val("Yucatán");</script>
                    @break
                @case('Zacatecas')
                <script> $('#state').val("Zacatecas");</script>
                    @break
                @default
                    <script> $('#state').val("");</script>
              @endswitch
            </div>
            <div class="col-sm">
              <label class="col-form-label" for="company">Empresa</label>
              <input class="form-control" type="text" value="{{ $user->empresa }}" name="company" id="company" required="required" autofocus="autofocus"/>
            </div>
          </div>

        </div>
      </div><br/>
      <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-sm">
          <button class="btn btn-primary btn-block noBorder" type="submit" id="buttonProfile">Guardar Perfil</button>
        </div>
        <div class="col-sm">
        </div>
      </div>

    </form>


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
