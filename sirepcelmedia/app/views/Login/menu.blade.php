<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>SIREP Login</title>

{{ HTML::style('css/style.css') }}
{{ HTML::script('js/jquery-1.6.4.min.js') }}

</head> 
<body> 

<div>
	<!--esta es la cabecera -->
	<div id="cabecera">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <td>
            <img src="images/icoSession.png"/>
            </td>
            <td width="90%">
            bienvenido: Usuario Logueado
            </td>
            <td>
            <a href="" style="color:#FFF">Cerrar Session</a>
            </td>
        </table>
    </div>
    <br>
    <br>
    <br>
    
	<!--Este es el Logo -->
  	<div align="center">
		<img src="images/SIREP-LOGO.png" width="400"/>
    </div>
    <br>
    
  <div class="alerta">
Alerta!: Prueba!
    </div>
    <br>
    
    
     <!--Este es el contenido de la Pagina -->
  <div id="menuHome">
        <div>
            <a href="{{ url('/BuscarProductor') }}"><img src="images/PRODUCTORES.png" id="icoMenu" width="130"/></a>
            <a href="{{ url('/AddProducto') }}"><img src="images/PRODUCTOS.png" id="icoMenu" width="130"/></a>
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






</body>
</html>