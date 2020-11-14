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
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <section id="container">
    <header class="header blue-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b>HAM</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
        </div>
        <div class="top-menu">
          <ul class="nav pull-right top-menu">
            <li>
              <a class="logout" href="login.html">Login</a>
            </li>
          </ul>
        </div>
    </header>
    <aside>
        <div id="sidebar" class="nav-collapse ">
	  <!-- sidebar menu start-->
	  <ul class="sidebar-menu" id="nav-accordion">
	    <li class="mt">
	      <a href="{{route('reservahabitacion')}}">
	       <i class="fa fa-dashboard"></i>
                <span>Registro</span>
                </a>
	    </li>
            
            <li class="mt">
              <a href="{{ route('empresa') }}">
                <i class="fa fa-dashboard"></i>
                <span>Empresa</span>
              </a> 
	    </li>
            <li class="mt">
               <a  href="{{ route('habitaciones') }}">
                <i class="fa fa-dashboard"></i>
                <span>Habitaciones</span>
               </a>
            </li>
          <li class="mt">
              <a href="{{ route('zonas') }}">
                <i class="fa fa-dashboard"></i>
                <span>Zona</span>
                </a>
	    </li>
	  <li class="mt">
              <a href="{{ route('areas') }}">
                <i class="fa fa-dashboard"></i>
                <span>Areas</span>
                </a>
	    </li>
	  <li class="mt">
              <a href="{{ route('estatus') }}">
                <i class="fa fa-dashboard"></i>
		  <span>Estatus</span>
	      </a>
          </li> 
          </ul>
          <!-- sidebar menu end-->
        </div>
    </aside>
    <section id="main-content">
        <section id="app" class="wrapper">
            
               @yield('content')
            
        </section>
      </section>
    </section>
      <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{ asset('lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{ asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="{{ asset('lib/common-scripts.js')}}"></script>
  <!--script for this page-->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
