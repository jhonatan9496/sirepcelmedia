@extends('base')

@section('titulo') Sirep Lista Productos  @stop

@section('contenido')

    <!--titulo paguina-->
  	<div id="tiModulos">
        <div style="float:left;" >
            <img src="images/ico_Productos.png" width="30" height="30"/>
        </div>
        <div style="height:30px; float:left; vertical-align:middle; font-size:18px; font-weight:bold; margin-left:10px; padding-top:3px">Productos</div>
    </div>
    <br>
    <!--Fin titulo paguina-->

    
    <div id="contenedorResponsive">
    
        <!-- Botones -->
        <div style="vertical-align:middle; height:40px">
            <a  href="{{ url('/AddProducto') }}"> <button class="boton">Agregar</button></a>
            <button class="boton">Eliminar</button>
        
            <div align="right" style="display:inline-table; width:80%; height:40px">
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/atraz.png" width="25"></div>
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/atrazDoble.png" width="25"></div>
                <div style="height:30px; display:inline-table; margin-top:5px">&nbsp;&nbsp;20-40 de 400&nbsp;&nbsp;</div>
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/AdelanteDoble.png" width="25"></div>
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/Adelante.png" width="25"></div>
            </div>
        </div>
        
        

        <!-- tabla dinamica-->
        <div id="cajas">
            <div style=" height:3px"></div>
            <!-- aqui se ejecuta el While para que se repita mientras exista-->
            <table width="100%">
               <tr>
                   <td id="celdas" width="20%">
                    	<select name="imagen">
                              
                        </select>
                    </td>
                   <td id="celdas" width="20%">
                    	{{ Form::select('producto', $productos) }}
                    </td>
                    <td id="celdas" width="20%">
                        
                        {{ Form::select('cadena', $cadenas) }}
                    </td>
                    <td id="celdas" width="20%">
                        {{ Form::select('grupo', $grupos) }}
                    </td>
                    <td id="celdas" width="20%">
                        {{ Form::select('subgrupo', $subgrupos) }}
                    </td>
                    <td id="celdas" width="20%">
                        Actualizar
                    </td>
               </tr>

              @foreach ($produc as $p ) 
               <tr>
                    <td id="celEsp"  width="18%">{{ $p->nombre_variedad }} </td>
                    <td id="celEsp" width="18%">{{ $p->nombre_producto}}</td>
                    <td id="celEsp" width="18%">{{ $p->nombre_cadena}}</td>
                    <td id="celEsp" width="18%">{{ $p->nombre_grupo}}</td>
                    <td id="celEsp" width="18%">{{ $p->nombre_sub_grupo}}</td>
                    <td id="celEsp" width="10%"> <button>Actualizar</button> </td>
               </tr>
              @endforeach
               
            </table>
            <div style=" height:3px"></div>
        </div>
        <br>
        
        <div style="vertical-align:middle; height:40px">
            <a  href="{{ url('/AddProducto') }}"> <button class="boton">Agregar</button></a>
            <button class="boton">Eliminar</button>
        
            <div align="right" style="display:inline-table; width:80%; height:40px">
                <div style="height:30px; display:inline-table; vertical-align:middle;">
                    <img src="images/atraz.png" width="25">
                </div>
                <div style="height:30px; display:inline-table; vertical-align:middle;">
                    <img src="images/atrazDoble.png" width="25">
                </div>
                <div style="height:30px; display:inline-table; margin-top:5px">
                    &nbsp;&nbsp;20-40 de 400&nbsp;&nbsp;
                </div>
                <div style="height:30px; display:inline-table; vertical-align:middle;">
                    <img src="images/AdelanteDoble.png" width="25">
                </div>
                <div style="height:30px; display:inline-table; vertical-align:middle;">
                    <img src="images/Adelante.png" width="25">
                </div>
            </div>
        </div>
        <br>
@stop
