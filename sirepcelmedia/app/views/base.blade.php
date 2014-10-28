<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('titulo') </title>

	{{ HTML::style('css/style.css') }}
	{{ HTML::script('js/jquery-1.6.4.min.js') }}
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/functions.js') }}

</head>
<body>


    <!--Cabecera -->
    <div id="cabecera">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <td>
            	<img src="images/icoSession.png"/>
            </td>
            <td width="90%">
            	Bienvenido: {{ Auth::user()->nombres; }}
            </td>
            <td>
            	<a href="{{ url('/logout') }}" style="color:#FFF">Cerrar Sessiones</a>
            </td>
        </table>
    </div>
    <br>
    <br>
    <br>
	<!--Cabecera -->

	<!--Nav bar -->
    <div id="botonera" align="center">
        <div style="max-width:960px">
            <div align="left" style="width:27%; display:inline-table; vertical-align:bottom; margin-left:10px">
                <img src="images/SIREP-LOGO.png" width="200" />
            </div>
     
            <div align="right" style="display:inline-table; width:70%; margin-bottom:5px">
                <a href="{{ url('/Menu') }}"><button class="boton">Inicio</button></a>
                <a href="{{ url('/BuscarProductor') }}"><button class="boton">Productores</button></a>
                <a href="{{ url('/AgregarVariedad') }}"><button class="boton">Productos</button></a>
                <a ><button class="boton">Envios Masivos</button></a>
                <a ><button class="boton">Fuentes</button></a>
                <a ><button class="boton">Reportes</button></a>
            </div>
        </div>
    </div>
    <br>
	<!-- Fin Nav bar -->


	<!-- Contenido de la paguina  -->
	@section('contenido')


	@show  
	<!-- Fin Contenido de la paguina  -->

	<!-- pie de Pagina -->
        <div id="piePagina">
        	Desarrollado por Celmedia MKT S.A.
        </div>
    <!-- pie de Pagina -->
</body>
</html>




