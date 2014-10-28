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



    <br>
    <br>
    <br>
    
	<!--Este es el Logo -->
  	<div align="center">
		<img src="images/SIREP-LOGO.png" width="400"/>
    </div>
    <br>
    
  <div class="alerta">
Alerta!: Ususario :  {{ Auth::user()->nombres; }}!
    </div>
    <br>
    
    
     <!--Este es el contenido de la Pagina -->
  <div id="menuHome">
        <div>
            <a href="{{ url('/BuscarProductor') }}"><img src="images/PRODUCTORES.png" id="icoMenu" width="130"/></a>
            <a href="{{ url('/AgregarVariedad') }}"><img src="images/PRODUCTOS.png" id="icoMenu" width="130"/></a>
            <a href="#"><img src="images/ENVIO_MASIVO.png" id="icoMenu" width="130"/></a>
        </div>
        <div>
            <img src="images/FUENTES.png" id="icoMenu" width="130"/>
            <img src="images/REPORTES.png" id="icoMenu" width="130"/>
        </div>
	</div>
    <br>
    <div align="center">
    Selecciona una Cagetoria
    </div>

    <br>
    
  
    
    

	<!--este es el pie de Pagina -->
  <div id="piePagina">
		Desarrollado por Celmedia MKT S.A.
  </div>
</div>



<!-- Fin Contenido de la paguina  -->

  <!-- pie de Pagina -->
        <div id="piePagina">
          Desarrollado por Celmedia MKT S.A.
        </div>
    <!-- pie de Pagina -->
</body>
</html>
