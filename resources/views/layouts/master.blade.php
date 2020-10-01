<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>-->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>

    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>
        @yield('titulo')
    </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
                <a class="navbar-brand" href="#">HAM</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Catalogos
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('empresa') }}">Empresas</a>
                                    <a class="dropdown-item" href="#">Sucursal</a>
                                    <a class="dropdown-item" href="#">Zonas</a>
                                    <a class="dropdown-item" href="#">Servicios</a>
                              <div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Registro
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Reserva Habitacion </a>
                              <div>
                            </li>
                        </ul>
                    </div>
                </div>
         </nav>
    <div id="app" class="container-fluid">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
</html>
