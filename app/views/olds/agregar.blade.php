@extends('layouts.base')

@section('head')
@parent
<link rel="stylesheet" href="{{ asset('css/csslogin.css') }}">
@stop

@section('content')
<section id="principal1">
    <header ><img id="banneragregar" src="{{ asset('imagen/banner.png') }}"/></header>
    <nav id="menu">
        <ul>
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/pares') }}">Pares</a></li>
            <li><a href="{{ url('/nuevo') }}">Agregar</a></li>
            <li><a href="{{ url('/correo') }}">Contactar</a></li>
            <li><a href="{{ url('/pares/editar') }}">Editar</a></li>
        </ul>
    </nav>
    <section id="contentable">

        {{-- Si hay errores se muestra una alerta --}}
        @if ($errors->all())
        <div class="alerta">
            <h3>Se han presentado los siguientes errores:</h3>
            <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
            </ul>
        </div>
        @endif

        <table id="tformu">
            <form action="{{ url('/nuevo') }}"  method="post" id="contenedorform">
                <tr>
                    <td style="vertical-align: top">
                        <label>Nombres:</label>
                        <input type="text" name="nombre" class="agrega" placeholder="Nombres de Usuario" required>

                        <label>Apellidos:</label>
                        <input type="text" name="apellido" class="agrega" placeholder="Apellidos de Usuario" required>

                        <!-- <label>Telefono:</label>
                        <input type="tel" name="telefono" class="agrega" placeholder="Telefono"> -->

                        <label>Correo:</label>
                        <input type="email" name="correo" class="agrega" placeholder="ejemplo@correo.com" required>

                        <label>Formación:</label>
                        <input type="text" name="formacion" class="agrega" placeholder="Pre o Postgrado">
                    </td>
                    <td style="vertical-align: top">
                        <label>Area de Formación:</label>
                        <input type="text" name="area_formacion" class="agrega" placeholder="Ej: Ciencias Agrarias">

                        <label>Area Específica:</label>
                        <input type="text" name="area_especifica" class="agrega" placeholder="Específica" required>

                        <label>Otras Areas:</label>
                        <input type="text" name="otras_areas" class="agrega" placeholder="+Otras">

                        <label>Funcionario/Entidad:</label>
                        <input type="text" name="entidad" class="agrega" placeholder="Ej: CORPOICA" required>

                        <label>Ultimos Años de Publicación:</label>
                        <input type="number" name="ultima_publicacion" placeholder="Ej: 2013" class="agrega" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Agregar" id="botonagregar">
                    </td>
                </tr>
            </form>
        </table>
    </section>
    <footer id="pie"> <small>&copy; Derechos Reservados 2014</small>
        <address>
            <a href="http://fca.edu.co/TA/" target="_blank">http://fca.edu.co/TA/</a>
        </address>
    </footer>
</section>
@stop
