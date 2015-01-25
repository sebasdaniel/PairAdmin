@extends('layouts.base')

@section('menuPares')
  <li class="active"><a href="{{ url('/pair') }}">Pares</a></li>
@stop

@section('maincontent')
  <div class="page-header">
    <h1>Crear nuevo par</h1>
  </div>
  <form id="form1" action="{{ url('/pair/add') }}" method="post">
    <div class="auto-order-form form-group">
      <label>Nombres:</label>
      <input type="text" name="nombre" class="form-control" placeholder="Nombres del par" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Apellidos:</label>
      <input type="text" name="apellido" class="form-control" placeholder="Apellidos del par" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Correo:</label>
      <input type="email" name="correo" class="form-control" placeholder="ejemplo@correo.com" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Formación:</label>
      <input type="text" name="formacion" class="form-control" placeholder="Pre o Postgrado" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Area de Formación:</label>
      <input type="text" name="area_formacion" class="form-control" placeholder="Ej: Ciencias Agrarias">
    </div>
    <div class="auto-order-form form-group">
      <label>Area Específica:</label>
      <input type="text" name="area_especifica" class="form-control" placeholder="Específica">
    </div>
    <div class="auto-order-form form-group">
      <label>Otras Areas:</label>
      <input type="text" name="otras_areas" class="form-control" placeholder="+Otras">
    </div>
    <div class="auto-order-form form-group">
      <label>Funcionario/Entidad:</label>
      <input type="text" name="entidad" class="form-control" placeholder="Ej: CORPOICA" required>
    </div>
    <div class="auto-order-form form-group">
      <label>Ultimo Año de Publicación:</label>
      <!-- Usar value, min y max segun el año para que sea dinamico -->
      <input type="number" min="{{ (idate('Y') - 2) }}" max="{{ date('Y') }}" name="ultima_publicacion" class="form-control" placeholder="Ej: {{ (idate('Y') - 1) }}" value="{{ (idate('Y') - 2) }}" required>
    </div>
    <input id="submit" class="btn btn-success center-block" type="submit" value="Guardar">
  </form>
@stop
