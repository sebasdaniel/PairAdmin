@extends('layouts.base')

@section('styles')
  @parent
  <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
@stop

@section('menuPares')
  <li class="active"><a href="{{ url('/pair') }}">Pares</a></li>
@stop

@section('maincontent')
  <h2 class="page-header">Datos</h2>
  <div class="checkbox pull-right">
    <label>
      <input id="edit-form" data-toggle="toggle" data-onstyle="success" type="checkbox">
      Editar
    </label>
  </div>
  <br>
  <br>

  <form id="form1" action="{{ url('/pair/'.$par['id'].'/edit') }}" method="post">
    <div class="auto-order-form form-group">
      <label>Nombres:</label>
      <input type="text" name="nombre" class="form-control" placeholder="Nombres del par" value="{{ $par['nombres'] }}" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Apellidos:</label>
      <input type="text" name="apellido" class="form-control" placeholder="Apellidos del par" value="{{ $par['apellidos'] }}" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Correo:</label>
      <input type="email" name="correo" class="form-control" placeholder="ejemplo@correo.com" value="{{ $par['correo'] }}" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Formación:</label>
      <input type="text" name="formacion" class="form-control" placeholder="Pre o Postgrado" value="{{ $par['formacion'] }}" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Area de Formación:</label>
      <input type="text" name="area_formacion" class="form-control" placeholder="Ej: Ciencias Agrarias" value="{{ $par['area_formacion'] }}">
    </div>
    <div class="auto-order-form form-group">
      <label>Area Específica:</label>
      <input type="text" name="area_especifica" class="form-control" placeholder="Específica" value="{{ $par['area_especifica'] }}">
    </div>
    <div class="auto-order-form form-group">
      <label>Otras Areas:</label>
      <input type="text" name="otras_areas" class="form-control" placeholder="+Otras" value="{{ $par['otras_areas'] }}">
    </div>
    <div class="auto-order-form form-group">
      <label>Funcionario/Entidad:</label>
      <input type="text" name="entidad" class="form-control" placeholder="Ej: CORPOICA" value="{{ $par['entidad'] }}" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Ultimo Año de Publicación:</label>
      <!-- Usar value, min y max segun el año para que sea dinamico -->
      <input type="number" min="2000" max="{{ date('Y') }}" name="ultima_publicacion" class="form-control" placeholder="Ej: {{ (idate('Y') - 1) }}" value="{{ $par['ultima_publicacion'] }}" required>
    </div>
    <input id="submit" class="btn btn-success center-block" type="submit" value="Guardar">
  </form>

  <h2 class="page-header">Articulos evaluados</h2>
  <a href="{{ url('/pair/'.$par['id'].'/article/add') }}" class="btn btn-success pull-right">Add</a>
  <br>
  <br>

  @if (count($articulos))
    <ul class="list-group">
      @foreach ($articulos as $articulo)
        <li class="list-group-item list-group-item-success">
          <a href="#" class="close" aria-label="Delete" onclick="eliminar('{{ url('/pair/'.$par['id'].'/article/del/'.$articulo['id']) }}')"><span aria-hidden="true">&times;</span></a>
          <p class="list-text-only"><em>{{ $articulo['pivot']['fecha_evaluacion'] }}</em> - {{ $articulo['titulo'] }}</p>
        </li>
      @endforeach
    </ul>
  @else
    <div class="alert alert-info" role="alert">
      <p><strong>No existen registros de articulos evaluados.</strong></p>
    </div>
  @endif
@stop

@section('scripts')
  @parent
  <script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
  <script>
    function disableForm(){
      // deshabilitar los elementos del formulario
      $('.form-control').attr('readonly', 'readonly'); // otro: disabled
      // deshabilitar boton de guardar
      $('#submit').attr('disabled', true);
    }

    function enableForm(){
      // habilitar los elementos del formulario
      $('.form-control').removeAttr('readonly');
      // habilitar boton
      $('#submit').attr('disabled', false);
    }

    $('#edit-form').change(function(){

      if ($(this).prop('checked')) {
        enableForm();
      } else {
        disableForm();
      }
    });
    
    disableForm();

    function eliminar(link){

      var acepto = confirm('Esta seguro de quitar el articulo?');

      if(acepto){
        window.location = link;
      }
    }
  </script>
@stop