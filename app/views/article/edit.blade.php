@extends('layouts.base')

@section('menuArticulos')
  <li class="active"><a href="{{ url('/article') }}">Articulos</a></li>
@stop

@section('maincontent')
  <h2 class="page-header">Editar articulo</h2>
  <br>
  @if (count($articulo))
    <form id="form1" class="form-horizontal" action="{{ url('/article/'.$articulo['id'].'/edit') }}" method="post">
      <div class="form-group">
        <label for="titulo" class="col-sm-2 control-label">Titulo del articulo</label>
        <div class="col-sm-10">
          <input type="text" name="titulo" class="form-control" placeholder="Titulo del articulo" value="{{ $articulo['titulo'] }}" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-success" value="Guardar">
        </div>
      </div>
    </form>
  @else
    <div class="alert alert-danger" role="alert">
      <p><strong>¡No existe el articulo al cual intenta acceder!</strong> Verifique la informacion.</p>
    </div>
  @endif
@stop