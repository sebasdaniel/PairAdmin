@extends('layouts.base')

@section('menuInicio')
  <li class="active"><a href="{{ url('/') }}">Inicio</a></li>
@stop

@section('maincontent')
  <div class="row">
    <div class="col-md-12">
      <header>
        <img class="center-block" src="{{ asset('images/banner.png') }}">
      </header>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div id="content-img">
        <img class="center-block" src="{{ asset('images/rev.png') }}" width="200" height="250">
      </div>
    </div>

    <div class="col-md-7">
      <article id="info">
        <hgroup class="page-header">
          <h1>PairAdmin - Temas Agrarios</h1>
        </hgroup>
        <p align="justify" id="texto" class="lead">Aplicacion para la administracion de pares de la Revista Temas Agrarios, la cual permite tener un mejor control sobre la informacion de los pares.</p>
      </article>
    </div>
  </div>
@stop