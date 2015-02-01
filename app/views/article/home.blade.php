@extends('layouts.base')

@section('menuArticulos')
  <li class="active"><a href="{{ url('/article') }}">Articulos</a></li>
@stop

@section('maincontent')
  <a href="{{ url('/article/add') }}" class="btn btn-success pull-right">Nuevo</a>

  <form id="form1" class="form-inline" action="{{ url('/article/search') }}" method="post">
    <div class="form-group">
      <label for="titulo">Buscar articulos</label>
      <input type="text" name="titulo" class="form-control" placeholder="Titulo del articulo" required>
    </div>
    <input type="submit" class="btn btn-success" value="Buscar">
  </form>

  <hr>

  @if (count($articulos))
    <ul class="list-group">
      @foreach ($articulos as $articulo)
        <li class="list-group-item">
          <div class="pull-right">
            <a href="{{ url('/article/'.$articulo['id'].'/edit') }}" class="btn btn-default">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
            </a>
          </div>
          <p class="list-text-btn">{{ $articulo['titulo'] }}</p>
        </li>
      @endforeach
    </ul>
  @else
    <div class="alert alert-info" role="alert">
      <p><strong>¡No existen registros todavia! ( :/ )</strong> Vale, por que no empiezas por crear uno.</p>
    </div>
  @endif
@stop