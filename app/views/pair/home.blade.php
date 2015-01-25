@extends('layouts.base')

@section('menuPares')
  <li class="active"><a href="{{ url('/pair') }}">Pares</a></li>
@stop

@section('maincontent')
  <form class="form-inline" method="post" action="{{ url('/pair/search')  }}">
    <div class="form-group">
      <label for="query">Buscar Pares Academicos</label>
      <input type="text" id="query" class="form-control" name="query" placeholder="Area Específica">
    </div>
    <div class="form-group">
      <label class="sr-only" for="estado">Estado</label>
      <select id="estado" class="form-control" name="estado">
        <option value="todos">Todos</option>
        <option value="aptos">Aptos</option>
        <option value="no-aptos">No Aptos</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success">
      <span class="glyphicon glyphicon-search"></span> Buscar
    </button>
  </form>

  <hr>
  <a href="{{ url('/pair/add') }}" class="btn btn-default pull-left">Nuevo</a>

  <p class="text-right">
    <span class="label label-success">Aptos</span>
    <span class="label label-danger">No aptos</span>
  </p>
  <br>
  <!-- Colocar condicional para verificar si el arreglo no esta vacio -->
  @if (count($pares))
    @foreach ($pares as $par)
      @if ($par['activo'])
        <div class="list-pairs bg-success">
      @else
        <div class="list-pairs bg-danger">
      @endif
        <div class="pull-right btn-group" role="group" aria-label="...">
          <a class="btn btn-default" href="{{ url('/pair/'.$par['id']) }}">Ver</a>
          <a class="btn btn-default" href="#">Articulos</a>
          <a class="btn btn-default" href="{{ url('/pair/'.$par['id'].'/contact') }}">
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
          </a>
        </div>
        <h4>{{ $par['nombres'] }} {{ $par['apellidos'] }} <small>- {{ $par['area_especifica'] }}</small></h4>
      </div>
    @endforeach
  @else
    <div class="alert alert-info" role="alert">
      <p><strong>¡No existen registros todavia! ( :/ )</strong> Vale, por que no empiezas por crear uno.</p>
    </div>
  @endif
@stop
