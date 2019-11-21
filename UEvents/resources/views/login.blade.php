@extends('layout')


@section('content')
<div class="modal" tabindex="-1" role="dialog" id="errorDialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lo sentimos,</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p>El correo o la contraseña son inválidos</p>
      </div>
      <div class="modal-footer">
        <!--button.btn.btn-primary(type='button') Ok-->
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<div class="text-center row align-self-center">
  <div class="col-12">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
      <div id="error"><br/><br/><img src="../images/logoBlancoV2.png" alt="Logo" width="300px"/><br/><br/>
        <h1 class="h3 mb-3 font-weight-normal loginTitle text-white">INICIA SESIÓN</h1>
        <label class="sr-only" for="email">Correo electrónico</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Correo electrónico" required="required" autofocus="autofocus"/>
        <label class="sr-only" for="password">Contraseña</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Contraseña" required="required"/>
        <button class="noBorder btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button><br/><br/>
        <p class="mt-5 mb-3 text-white">© UEvents 2019</p>

      </div>
    </form>
  </div>
</div>
@endsection
