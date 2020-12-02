<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>
        @yield('titulo')
    </title>
  <!--Default-->
  <!--sweetalert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link  href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">
  <link  href="{{ asset('demo/demo.css') }}" rel="stylesheet">
</head>
<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
	  <div class="logo-image-small">
          </div>
        </a>
	<a href="#" class="simple-text logo-normal">
		    HAM
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
	  <li>
            <a href="{{ route('areas') }}">
                <i class="nc-icon nc-air-baloon"></i>
                <p>Areas</p>
              </a> 
          </li>
                             <li>
            <a href="{{ route('estatus') }}">
              <i class="nc-icon nc-tag-content"></i>
              <p>Estatus</p>
            </a>
          </li>
          <li>
                   <li>
            <a href="{{ route('notificaciones') }}">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notificaciones</p>
            </a>
          </li>
          
	  <li>
            <a href="{{ route('zonas') }}">
              <i class="nc-icon nc-pin-3"></i>
              <p>Zona</p>
            </a>
          </li>
	  <li>
            <a href="{{ route('user') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>Usuarios</p>
            </a>
          </li>
	  <li>
            <a href="{{route('qr')}}">
              <i class="nc-icon nc-app"></i>
              <p>Qr</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Health Administration Management</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div id="app" class="content">
               @yield('content')
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
        </div>
      </footer>
    </div>
  </div>
  <script src="{{asset('js/core/jquery.min.js')}}"></script>
  <script src="{{asset('js/core/popper.min.js')}}"></script>
  <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{asset('js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/paper-dashboard.min.js')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('demo/demo.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    $(document).ready(function() {
      demo.initGoogleMaps();
    });
  </script>
</body>
</html>
