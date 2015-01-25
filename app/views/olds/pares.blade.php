@extends('layouts.base')

@section('content')
<section id="principal">
  <header><img id="banner" src="{{ asset('imagen/banner.png') }}"/></header>
  <nav id="menu">
    <ul>
      <li><a href="{{ url('/') }}">Inicio</a></li>
      <li><a href="{{ url('/pares') }}">Pares</a></li>
      <li><a href="{{ url('/nuevo') }}">Agregar</a></li>
      <li><a href="{{ url('/correo') }}">Contactar</a></li>
      <li><a href="{{ url('/pares/editar') }}">Editar</a></li>
    </ul>
  </nav>
  <section id="contpares">
    <section id="listpares">
      <section id="formulario">
        <label id="titu">Buscar Pares Academicos</label>
        <form method="post" action="">
          <input type="text" id="busc" name="buscar" placeholder="Area Específica" id="cambuscar">
          <select name="estado" id="est">
            <option>--Elegir--</option>
            <option>Aptos</option>
            <option>No Aptos</option>
          </select>
          <input type="submit" value="Buscar" id="buscar">
        </form>
      </section>
      <section id="lista">

        @foreach ($pares as $par)
        
          <div class="rect">
            <p>{{ $par['nombres'] }} {{ $par['apellidos'] }} - {{ $par['area_especifica'] }}<span style="float:right; margin-right: 5px;"><a href="{{ url('/pares/'.$par['id'].'/editar') }}">Editar</a>&nbsp;&nbsp;<a href="{{ url('/pares/'.$par['id'].'/correo') }}">Contactar</a></span></p>
          </div>
          
        @endforeach
      </section>
    </section>
  </section>
  <footer id="pie"> <small>&copy; Derechos Reservados 2014</small>
    <address>
    <a href="http://fca.edu.co/TA/" target="_blank">http://fca.edu.co/TA/</a>
    </address>
  </footer>
</section>
@stop
