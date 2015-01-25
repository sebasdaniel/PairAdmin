@extends('layouts.base')

@section('menuArticulos')
  <li class="active"><a href="{{ url('/article') }}">Articulos</a></li>
@stop

@section('maincontent')
  <h2 class="page-header">Nuevo articulo</h2>
  <br>
  <form id="form1" class="form-horizontal" action="{{ url('/article/add') }}" method="post">
    <div class="form-group">
      <label for="titulo" class="col-sm-2 control-label">Titulo del articulo</label>
      <div class="col-sm-10">
        <input type="text" name="titulo" class="form-control" placeholder="Titulo del articulo" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-success" value="Guardar">
      </div>
    </div>
  </form>
@stop