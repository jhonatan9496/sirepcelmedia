@extends('base')

@section('titulo') Sirep Lista Productos  @stop

@section('contenido')

<!--Este es el contenido de la Pagina -->
  	<div id="tiModulos">
    <div style="float:left;" >
    <img src="images/ico_Productos.png" width="30" height="30"/>
    </div>
    <div style="height:30px; float:left; vertical-align:middle; font-size:18px; font-weight:bold; margin-left:10px; padding-top:3px">Productos</div>
    </div>
    <br>

    
    <!--Este es el contenido de la Pagina -->
  <div id="contenedorResponsive">
    
       
        <a href="AgregarProductos.html"> <button class="boton">Agregar Variedad</button></a>
        <br>
        <br>
        

        <!-- tabla dinamica -->
        <div id="cajas">
        
        <div align="left" style="display:inline-table; width:665px; height:30px">
        <label>LISTAR &nbsp;&nbsp;&nbsp;</label>
        <select name="imagen2" style="width:200px">
                <option value="seleccionar">Seleccionar</option>
                <option value="Variedad">Variedad</option>
                <option value="Producto">Producto</option>
                <option value="Cadena">Cadena</option>
                <option value="Grupo">Grupo</option>
                <option value="SubGrupo">SubGrupo</option>
                
              </select><br><br>
        </div>
        
        
        
         <!-- Botones -->
        <div style="height:30px; display:inline-table; width:200px ">
            <div align="right" style="display:inline-table; height:30px">
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/atraz.png" width="25"></div>
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/atrazDoble.png" width="25"></div>
                <div style="height:30px; display:inline-table; margin-top:5px">&nbsp;&nbsp;20-40 de 400&nbsp;&nbsp;</div>
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/AdelanteDoble.png" width="25"></div>
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/Adelante.png" width="25"></div>
            </div>
        </div>
        
        
        
        <div style="background-color:#9C9; width:100%; height:2px"></div>
           
            <div style=" height:3px"></div>

            <!-- aqui se ejecuta el While para que se repita mientras exista -->
            <table width="100%">
               <tr>
               
               <td id="celdas" width="5%">
               </td>
               
               
               <td id="celdas" width="17%">
                	<input type="text">
                </td>
               <td id="celdas" width="17%">
                	{{ Form::select('producto', array('Seleccionar Producto' ,$productos)) }}
                </td>
                <td id="celdas" width="17%">
                    {{ Form::select('cadena',array('Seleccionar Cadena' , $cadenas)) }}
                </td>
                <td id="celdas" width="17%">
                    {{ Form::select('grupo',array('Seleccionar Grupo' , $grupos)) }}
                </td>
                <td id="celdas" width="17%">
                    {{ Form::select('subgrupo',array('Seleccionar Sub Grupo' , $subgrupos)) }}
                </td>
                <td id="celdas" width="10%">
              
                </td>
               </tr>
               
            @foreach ($join as $p ) 
               <tr>
                <td id="celEsp" width="5%"><input type="checkbox" name=" {{ $p->id }} "></td>
                    <td id="celEsp"  width="17%">{{ $p->nombre_variedad }} </td>
                    <td id="celEsp" width="17%">{{ $p->nombre_producto}}</td>
                    <td id="celEsp" width="17%">{{ $p->nombre_cadena}}</td>
                    <td id="celEsp" width="17%">{{ $p->nombre_grupo}}</td>
                    <td id="celEsp" width="17%">{{ $p->nombre_sub_grupo}}</td>
                    <td id="celEsp" width="10%"> <button>Actualizar</button> </td>
               </tr>
            @endforeach

               
            </table>
            <div style=" height:3px"></div>
  
		<div align="left" style="display:inline-table; width:665px; height:30px">
        <button class="boton">Eliminar</button>
        </div>
        
        
        
         <!-- Botones -->
        <div style="height:30px; display:inline-table; width:200px ">
            <div align="right" style="display:inline-table; height:30px">
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/atraz.png" width="25"></div>
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/atrazDoble.png" width="25"></div>
                <div style="height:30px; display:inline-table; margin-top:5px">&nbsp;&nbsp;20-40 de 400&nbsp;&nbsp;</div>
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/AdelanteDoble.png" width="25"></div>
                <div style="height:30px; display:inline-table; vertical-align:middle;"><img src="images/Adelante.png" width="25"></div>
            </div>
        </div>
  
        </div>
        <br>

 
@stop