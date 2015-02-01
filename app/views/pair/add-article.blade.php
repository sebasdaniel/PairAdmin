@extends('layouts.base')

@section('menuPares')
  <li class="active"><a href="{{ url('/pair') }}">Pares</a></li>
@stop

@section('maincontent')
  <!-- Formulario para buscar articulos por titulo -->
  <form id="form1" class="form-inline" action="{{ url('/pair/'.$idPar.'/article/search') }}" method="post">
    <div class="form-group">
      <label for="articulo" class="sr-only">Titulo del articulo</label>
      <input type="text" name="articulo" class="form-control" placeholder="Titulo del articulo" required>
    </div>
    <button type="submit" class="btn btn-success" aria-label="Search">
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    </button>
  </form>

  <hr>
  <p class="lead">Relacionar articulo con par: <em>{{ $nombrePar }}</em></p>
  <!-- Formulario para seleccionar el articulo a relacionar con el par -->
  @if (count($articulos))
    <form id="form2" action="{{ url('/pair/'.$idPar.'/article/add') }}" method="post" class="form-horizontal">
      <ul class="list-group">
        @foreach ($articulos as $articulo)
          <li class="list-group-item">
            <div class="radio">
              <label>
                <input type="radio" name="articulo" id="article{{ $articulo['id'] }}" value="{{ $articulo['id'] }}">{{ $articulo['titulo'] }}
              </label>
            </div>
          </li>
        @endforeach
      </ul>
      <!-- compo para fecha -->
      <div class="form-group">
        <label for="evaluation-date" class="col-sm-2 control-label">Fecha de evaluacion</label>
        <div class="col-sm-2">
          <input type="date" name="evaluation-date" class="form-control" placeholder="yyyy-mm-dd" required>
        </div>
      </div>
      <input type="submit" class="btn btn-success center-block" value="Add">
    </form>
  @else
    <div class="alert alert-info" role="alert">
      <p><strong>¡No existen registros todavia! ( :/ )</strong> Vale, por que no empiezas por crear uno.</p>
    </div>
  @endif
@stop