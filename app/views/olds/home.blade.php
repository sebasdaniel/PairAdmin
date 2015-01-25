@extends('layouts.base')

@section('content')
  <section id="principal">
    <header > <img id="banner" src="{{ asset('imagen/banner.png') }}"/> </header>
    <nav id="menu">
      <ul>
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ url('/pares') }}">Pares</a></li>
        <li><a href="{{ url('/nuevo') }}">Agregar</a></li>
        <li><a href="{{ url('/pares/1/correo') }}">Contactar</a></li>
        <li><a href="{{ url('/pares/2/editar') }}">Editar</a></li>
      </ul>
    </nav>
    <section id="conten">
      <section id="informacion">
      <section id="contimag"> <img id="imag" src="{{ asset('imagen/rev.png') }}"> </section>
        <article id="info"> 
        	<hgroup>
            <h1 align="center">Revista Temas Agrarios</h1>
            <!--<h2>subtitulo pimera seccion</h2>--> 
          </hgroup>
          <p align="justify" id="texto"> La Revista Temas Agrarios es una organización científico-académica sin ánimo de lucro asociada a la Facultad de Ciencias Agrícolas de la Universidad de Córdoba que publica resultados de investigaciones científicas, tecnológicas y revisiones bibliográficas de temas específicos para obtener información actualizada de aspectos relevantes de las ciencias agroalimentarias..<br>
            <br>
            Temas Agrarios is an official biannual publication of the Agricultural Sciences Faculty of the University of Cordoba, 
            Colombia. The main goal of this journal is to disseminate information and knowledge about science, technology and 
            innovation in agricultural and food sciences. The intended audience includes scientists and professional inside the 
            Agricultural and food sciences disciplines. </p>
        </article>
      </section>
    </section>
    <footer id="pie"> <small>&copy; Derechos Reservados 2014</small>
      <address>
      <a href="http://fca.edu.co/TA/" target="_blank">http://fca.edu.co/TA/</a>
      </address>
    </footer>
  </section>
@stop