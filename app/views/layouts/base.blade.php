<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>PairAdmin - Administrador de pares para la revista Temas Agrarios</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- styles -->
  @section('styles')
	  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	  <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
	  <link href="{{ asset('css/general.css') }}" rel="stylesheet">
  @show
</head>

<body style="padding-top: 70px">
  <!-- Contenedor principal sin bordes -->
  <div id="main" class="container">

    <!-- Barra de navegacion fijada en la parte superior -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">PairAdmin</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <!-- class active cambia de acuerdo a cada pagina -->
          @section('menuInicio')
            <li><a href="{{ url('/') }}">Inicio</a></li>
          @show
          @section('menuPares')
            <li><a href="{{ url('/pair') }}">Pares</a></li>
          @show
          @section('menuArticulos')
            <li><a href="{{ url('/article') }}">Articulos</a></li>
          @show
          @section('menuContactar')
            <li><a href="{{ url('/contact') }}">Contactar</a></li>
          @show
          </ul>
        </div>
      </div>
    </nav>

    <!-- Contenido de la pagina, esta es la parte que cambia por cada pagina -->
    <div class="content panel panel-default">
      <section id="main-content" class="panel-body">

        <!-- Contenido cambia desde aqui -->
        @yield('maincontent')
        <!-- fin contenido -->
      </section>
    </div>

    <!-- Pie de pagina -->
    <footer id="pie" class="panel panel-default">
      <small>&copy; Derechos Reservados 2014</small>
      <address>
        <a href="http://fca.edu.co/TA/" target="_blank">http://fca.edu.co/TA/</a>
      </address>
    </footer>

  </div>
  <!-- scripts -->
  @section('scripts')
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  @show
</body>
</html>