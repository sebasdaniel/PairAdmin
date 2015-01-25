@extends('layouts.base')

@section('head')
  @parent
  <link rel="stylesheet" href="{{ asset('css/csslogin.css') }}">
  <!--<link rel="stylesheet" href="{{ asset('calendario_dw/calendario_dw-estilos.css') }}">
  <script type="text/jscript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('calendario_dw/jquery-1.4.4.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('calendario_dw/calendario_dw.js') }}"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
      $("#campofecha").calendarioDW();
  	  $("#campofecha2").calendarioDW();
    });
  </script>-->
@stop

@section('content')
<section id="principal1">
  <header ><img id="banneragregar" src="{{ asset('imagen/banner.png') }}"/></header>
  <nav id="menu">
    <ul>
      <li><a href="{{ url('/') }}">Inicio</a></li>
      <li><a href="{{ url('/pares') }}">Pares</a></li>
      <li><a href="{{ url('/nuevo') }}">Agregar</a></li>
      <li><a href="{{ url('/correo') }}">Contactar</a></li>
      <li><a href="{{ url('/pares/editar') }}">Editar</a></li>
    </ul>
  </nav>
  <section id="contentable">
    
    	<table id="tformu">
        <form action="{{ url('/pares/'.$par['id'].'/editar') }}"  method="post" id="contenedorform">
        	<tr>
            	<td>
    	<label>Nombres:</label>
        <input type="text" name="nombre" class="agrega" placeholder="Nombres de Usuario" value="{{ $par['nombres'] }}">
        
   		<label>Apellidos:</label>
        <input type="text" name="apellido" class="agrega" placeholder="Apellidos de Usuario" value="{{ $par['apellidos'] }}">
        
        <!-- <label>Telefono:</label>
        <input type="tel" name="telefono" class="agrega" placeholder="Telefono" value="{{ $par['telefono'] }}"> -->
        
        <label>Correo:</label>
        <input type="email" name="correo" class="agrega" placeholder="ejemplo@correo.com" value="{{ $par['correo'] }}">
        
        <label>Formación:</label>
        <input type="text" name="formacion" class="agrega" placeholder="Pre o Postgrado" value="{{ $par['formacion'] }}"></td>

        <td><label>Area de Formación:</label>
        <input type="text" name="area_formacion" class="agrega" placeholder="Ej: Ciencias Agrarias" value="{{ $par['area_formacion'] }}">
         
        <label>Area Específica:</label>
        <input type="text" name="area_especifica" class="agrega" placeholder="Específica" value="{{ $par['area_especifica'] }}">
        
        <label>Otras Areas:</label>
        <input type="text" name="otras_areas" class="agrega" placeholder="+Otras" value="{{ $par['otras_areas'] }}">
     
        <label>Funcionario/Entidad:</label>
        <input type="text" name="entidad" class="agrega" placeholder="Ej: CORPOICA" value="{{ $par['entidad'] }}">
        
        <label>Ultimos Años de Publicación:</label>
        <input type="text" name="ultima_publicacion" placeholder="Ej: 2013" class="agrega" value="{{ $par['ultima_publicacion'] }}">

    <!--<input type="button" id="ir" class="opc" value="<-"/>-->
	</td>
          </tr>
          <tr><td colspan="2"> <input type="submit" value="Editar" id="botonagregar">
          </td></tr>
           </form>
         </table>
  </section>
  <footer id="pie"> <small>&copy; Derechos Reservados 2014</small>
    <address>
    <a href="http://fca.edu.co/TA/" target="_blank">http://fca.edu.co/TA/</a>
    </address>
  </footer>
</section>

@if ($errors->all())
<script type="text/javascript">
  alert('Algunos datos no son correctos');
</script>
@endif

@stop




