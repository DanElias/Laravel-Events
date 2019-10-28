<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>  {{ $title }}  </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stylesheets/style.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Staatliches">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Futura">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Sarabun">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--DataTables pluggin-->
    <script src="/javascripts/jquery.dataTables.min.js"></script>
    <script src="/javascripts/dataTables.buttons.min.js"></script>
    <script src="/javascripts/buttons.flash.min.js"></script>
    <script src="/javascripts/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="/stylesheets/buttons.dataTables.css">
    <link rel="stylesheet" href="/stylesheets/jquery.dataTables.css">
    <link rel="stylesheet" href="/stylesheets/simple-sidebar.css"/>
  </head>

  <body class="adminBody">

    <div class="d-flex bg-white" id="wrapper">
      <div class="border-right bg-light" id="sidebar-wrapper">
        <div class="sidebar-heading"> email@gmail.com </div>
        <div class="list-group list-group-flush">

          <a class="list-group-item list-group-item-action bg-light" href="/eventos">
            <i class="material-icons align-bottom">today</i>
            Eventos
          </a>

          <a class="list-group-item list-group-item-action bg-light" href="#">
            <i class="material-icons align-bottom">account_circle</i>
            Usuarios
          </a>

        </div>
      </div>



    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary bgcolorOrange noBorder" id="menu-toggle">
          Ocultar menú
        </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" id="logoutButton" href="/iniciarSesion">
                Cerrar sesión
              </a>
            </li>
          </ul>
        </div>

      </nav>

      <div class="container-fluid containerPadding">

        <div class="modal fade" tabindex="-1" role="dialog" id="errorDialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header formModalHeader">
                <h5 class="modal-title">Ha ocurrido un error</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p id="errorMessage"> {{ $errorMessage }}</p>
              </div>
              <div class="modal-footer">
                <!--button.btn.btn-primary(type='button') Ok-->
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="successDialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header formModalHeader">
                <h5 class="modal-title">¡Éxito!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <p id="successMessage">{{ $successMessage }}</p>
              </div>
              <div class="modal-footer">
                <!--button.btn.btn-primary(type='button') Ok-->
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

          @yield('content')

      </div>
    </div>
  </div>

      <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>-->

      <script>
          $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
          });
      </script>

      <script src="/javascripts/client.js"></script>
      <script src="/javascripts/ajax.js"></script>


      <script>

          $(document).ready(function() {
              $('#my_pagination_table').DataTable( {
                  language: {
                      searchPlaceholder: "eventos"
                  },
                  dom: 'Bfrtip',
                  buttons: [
                      'excel',
                      {
                      extend: 'pdfHtml5',
                      orientation: 'landscape',
                      pageSize: 'LEGAL',

                      },
                      {
                      extend: 'print',
                      text: 'Imprimir',
                      orientation: 'landscape',

                      }
                  ]
              } );
              $('.dt-buttons').append('<br><br><br><div class="row .align-bottom"><div class="col s12 m12" style="color: #757575">  <i class="material-icons align-bottom prefix my_search">search</i> Realiza una búsqueda: </div></div>')
              $('.dataTables_filter').addClass('pull-left');
          });
      </script>


  </body>


</html>
