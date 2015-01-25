@extends('layouts.base')

@section('menuContactar')
  <li class="active"><a href="{{ url('/contact') }}">Contactar</a></li>
@stop

@section('maincontent')
  <form id="form1" class="center-block send-email" action="#" method="post">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="asunto">Asunto</label>
      <input type="text" name="asunto" class="form-control" placeholder="Asunto">
    </div>
    <div class="form-group">
      <label for="message">Mensaje</label>
      <textarea name="message" class="form-control" rows="6" required></textarea>
    </div>
    <div class="form-group">
      <label for="file">Archivo</label>
      <input type="file" name="file">
    </div>
    <input type="submit" class="btn btn-success center-block" value="Enviar">
  </form>
@stop