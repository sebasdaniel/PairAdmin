@extends('layouts.base')

@section('head')
  @parent
  <link rel="stylesheet" href="{{ asset('css/csslogin22.css') }}">
@stop

@section('content')
<section id="principal">
  <header > <img id="banner" src="{{ asset('imagen/banner.png') }}"/> </header>
  <nav id="menu">
    <ul>
      <li><a href="{{ url('/') }}">Inicio</a></li>
      <li><a href="{{ url('/pares') }}">Pares</a></li>
      <li><a href="{{ url('/nuevo') }}">Agregar</a></li>
      <li><a href="{{ url('/correo') }}">Contactar</a></li>
      <li><a href="{{ url('/pares/editar') }}">Editar</a></li>
    </ul>
  </nav>
  <section id="contcontac">
    <section id="conformu">
      <table>
        <form action="" method="post">
          <tr>
            <td><label for="nombre">Asunto:</label></td>
          </tr>
          <tr>
            <td><input id="nombre" type="text" name="nombre" class="cont" placeholder="Asunto"/></td>
          </tr>
          <tr>
            <td><label for="email">Email:</label></td>
          </tr>
          <tr>
            <td><input id="correo" type="email" name="email" class="cont" placeholder="ejemplo@correo.com"/></td>
          </tr>
          <tr>
            <td><label for="mensaje">Mensaje:</label></td>
          </tr>
          <tr>
            <td><textarea id="mensaje" class="cont" name="mensaje" placeholder="Mensaje">
Montería, Córdoba, Colombia. Junio 09 de 2014
Doctor
Juan Antonio Noriega Rodríguez
Universidad de Sonora. México

Respetado Doctor Noriega Rodríguez,

Considerando su reconocida trayectoria y calidad académica, el Comité Editorial de la Revista TEMAS AGRARIOS de la Universidad de Córdoba, le solicita su importante colaboración  para  evaluar  el  artículo: "Efecto del concentrado de Rubas (Ullucus Tuberosus) en las características microbiológicas, proximales, sensoriales y fisicoquímicas de yogurt durante almacenamiento en refrigeración”.

Si usted está disponible de tiempo y su respuesta es positiva, nos puede confirmar en este correo para enviarle las instrucciones a los autores, el artículo en mención, el formato de evaluación y el formato de hoja de vida para diligenciar sus datos personales,  en caso de no poder,   agradezco   el   favor   de  sugerir  evaluadores, 	sus  contactos (Nombres,  afiliación institucional, e-mail y teléfonos) nacionales o internacionales expertos en el tema.

Igualmente, hacemos un llamado para que envíen sus artículos científicos por este medio para ser publicados en nuestra Revista Temas Agrarios, la cual está indexada en Publindex (Colciencias) en Categoría “B” y de la que puede consultar sus contenidos completos en línea, en la página: http://fca.edu.co/TA/


Cordialmente,

Enrique Miguel Combatt Caballero
Editor</textarea></td>
          </tr>
          <tr>
            <td><input type="file" multiple name="archivo"/></td>
          </tr>
          <tr>
            <td><input id="submit" type="submit" class="botones" name="submit" value="Enviar" /></td>
          </tr>
        </form>
      </table>
    </section>
  </section>
  <footer id="pie"> <small>&copy; Derechos Reservados 2014</small>
    <address>
    <a href="http://fca.edu.co/TA/" target="_blank">http://fca.edu.co/TA/</a>
    </address>
  </footer>
</section>
@stop
