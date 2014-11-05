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
    
       
        <a href="{{ url('/AgregarVariedad') }}">
            <button class="boton">Agregar Variedad</button>
        </a>
        <br>
        <br>
        

        <!-- tabla dinamica -->
        <div id="cajas">
        
        <div align="left" style="display:inline-table; width:665px; height:30px">
        <label>LISTAR &nbsp;&nbsp;&nbsp;</label>
            <select id="cambiar_table" name="imagen2" style="width:200px">
                <option value="Variedad">Variedad</option>
                <option value="Cadena">Cadena</option>
                <option value="Grupo">Grupo</option>
                <option value="SubGrupo">SubGrupo</option>
                <option value="Producto">Producto</option>
            </select><br><br>
        </div>
        
        <div style="background-color:#9C9; width:100%; height:2px"></div>
           
            <div style=" height:3px"></div>

            <!-- aqui se ejecuta el While para que se repita mientras exista -->
            <div= id="contenedor_tabla">
            <!-- tabla listado filtro -->
            <table width="100%" id="tabla_filtros">
        {{ Form::open(array('url'=>'filtrarvariedad','class'=>'listar_ajax')) }}
               <tr>
                    <td id="celdas" width="5%">
                    </td>
                    <td id="celdas" width="17%">
                {{ Form::select('cadena',array('seleccionar'=>'Seleccionar Cadena' , $cadenas),null,array('id' => 'select_cadena_filtro')) ;}}
                    </td>
                    <td id="celdas" width="17%">
                        {{ Form::select('select_grupo',array('seleccionar'=>'Seleccionar', $grupos),null,array('id' => 'select_grupo')) ;}}
                    </td>
                    <td id="celdas" width="17%">
                        <select name="subgrupo" id="select_sub">
                            <option value="seleccionar"  >Seleccionar Grupo</option>
                    </select>
                    </td>
                    <td id="celdas" width="17%">
                        <select name="producto" id="seleccionar_producto">
                          <option value="seleccionar">Seleccionar Sub Grupo</option>
                        </select>
                    </td>

                   <td id="celdas" width="17%">
                    	<input type="text" name="filtra_variedad">
                    </td>
                   
                    <td id="celdas" width="10%">
                    {{ Form::button(' Filtrar ', array('type' => 'submit', 'class' => 'boton')) }} 
        {{ Form::close() }}

                    </td>
               </tr>
               </table>

               <!-- Tabla listado informacion  -->
               <table width="100%" id="tabla_contenido">
        {{ Form::open(array('url'=>'filtrarvariedad','class'=>'listar_ajax')) }}
            
            @foreach ($join as $p ) 

               <tr>
                <td id="celEsp" width="5%"><input type="checkbox" name="eliminar[]" value="{{ $p->id}}" ></td>
                    <td id="celEsp" width="17%">{{ $p->nombre_cadena}}</td>
                    <td id="celEsp" width="17%">{{ $p->nombre_grupo}}</td>
                    <td id="celEsp" width="17%">{{ $p->nombre_sub_grupo}}</td>
                    <td id="celEsp" width="17%">{{ $p->nombre_producto}}</td>
                    <td id="celEsp"  width="17%">{{ $p->nombre_variedad }} </td>
                    <td id="celEsp" width="10%"> <button idvariedad='{{ $p->id }}'  nombrevariedad='{{ $p->nombre_variedad }}' codigodane='{{ $p->codigo_dane }}' class="open" class='actualizar_variedad' >Actualizar</button> </td>
               </tr>
            @endforeach
            </table>

            

            </div>

            <div style=" height:3px"></div>
  
		<div align="left" style="display:inline-table; width:665px; height:30px">
            <br>
        <!-- <button class="boton">Eliminar</button> -->
            {{ Form::button(' Eliminar ', array('type' => 'submit', 'class' => 'boton')) }} 

        </div>
      
        {{ Form::close() }}


                <!-- Div Oculto -->
<!-- <button id="open">prueba pop up</button> -->

<div id="popup" style="display: none;">
    <div class="content-popup">
        <div class="close"><a href="#" id="close"><img src="images/close.png"/></a></div>
        <div id="tiModulos">
    <div style="float:left;" >
    <img src="images/ico_Productos.png" width="30" height="30"/>
    </div>
    <div style="height:30px; float:left; vertical-align:middle; font-size:18px; font-weight:bold; margin-left:10px; padding-top:3px"> Actualizar Variedad</div>
    </div>
    <br>
        <div>
                   {{ Form::open(array('url' => 'guardarvariedad','class' => 'register_ajax')) }}

           <!-- Agregar  Variedad  -->
        <div style="display:inline-table; width:100%">
              <div id="cajas">
                    <div id="titulos">Variedad</div><br>
                        <div id="entradaTexto">
                        <div style="height:20px; vertical-align: top"><label>Nombre Variedad</label></div>
                        <input type="text" name="nombre_variedad" id="nombre_variedad" required>
                        </div>
                        <div id="entradaTexto">
                        <div style="height:20px; vertical-align: top"><label>Codigo Dane</label>
                        </div>
                        <input type="text" name="codigo_dane" id='codigo_dane' required>
                        </div>
              </div>
        </div>
        <br>
        <br>
        <!-- Fin Agregar Variedad -->
               
        <!--  Agregar Grupo -->
        <div style="display:inline-table; width:440px; margin-right:14px">
            <div id="cajas">
                <div id="titulos">Grupo</div><br>
                <div id="entradaTexto">
                    <div style="height:20px; vertical-align: top">
                    <label>Grupo</label>
                </div>

                  {{ Form::select('select_grupo',array('seleccionar'=>'Seleccionar', $grupos),null,array('id' => 'select_grupo')) ;}}
                </div>
                <div id="entradaTexto">
                <div style="height:20px; vertical-align: top">
                <input name="nuevo_grupo" type="checkbox"  id="nuevo_grupo">
                <label style="padding-bottom:10px">Nuevo</label>
                 </div>

               <input type="text" name="nombre_grupo" id="nombre_grupo">
               </div>
          </div>
          </div>
          <!-- fin Agregar grupos  -->



          <!-- Agregar Subgruois -->
          <div style="display:inline-table; width:442px">
          <div id="cajas">
                <div id="titulos">Sub Grupo</div>
                <br>
                <div id="entradaTexto">
                    <div style="height:20px; vertical-align: top">
                    <label>Sub Grupo</label>
                    </div>
                   <select name="subgrupo" id="select_sub">
                    <option value="seleccionar"  >Seleccionar</option>

                    </select>
                    <div > </div>
                </div>
                <div id="entradaTexto">
                <div style="height:20px; vertical-align: top">
                <input name="nuevo_subgrupo" type="checkbox"   id="nuevo_subgrupo">
                <label style="padding-bottom:10px">Nuevo</label>
                 </div>
               <input type="text" name="nombre_subgrupo" id="nombre_subgrupo">
               </div>
          </div>
          </div>

          <!-- Fin Agregar Subgrupos -->
          
          <br>
           <br>
          <!-- Inicio Agregar Producto -->
          
          <div style="display:inline-table; width:442px; margin-right:12px">
          <div id="cajas">
                <div id="titulos">Producto</div>
                <br>
                
                <div id="entradaTexto">
                    <div style="height:20px; vertical-align: top">
                    <label>Producto</label>
                    </div>
                   <select name="producto" id="seleccionar_producto">
                          <option value="seleccionar">Seleccionar</option>
                    </select>
                </div>
            
                <div id="entradaTexto">

                <div style="height:20px; vertical-align: top">
                <input name="check_producto" type="checkbox"  id="check_producto">
                <label style="padding-bottom:10px">Nuevo</label>
                 </div>

               <input type="text" name="nuevo_producto" id="nuevo_producto">
               </div>
          </div>
          </div>

          <!-- Fin Agregar Producto -->

          <!-- Inicio agregar cadena -->
        
          <div style="display:inline-table; width:442px">
          <div id="cajas">
                <div id="titulos">Cadena</div>
                <br>
                <div id="entradaTexto">
                    <div style="height:20px; vertical-align: top">
                    <label>Cadena</label>
                    </div>
                  {{ Form::select('cadena',array('seleccionar'=>'Seleccionar', $cadenas),null,array('id' => 'select_cadena')) ;}}
                </div>
                <div id="entradaTexto">
                <div style="height:20px; vertical-align: top">
                <input name="check_cadena" type="checkbox"  id="check_cadena">
                <label style="padding-bottom:10px">Nuevo</label>
                 </div>
               <input type="text" name="nombre_cadena" id="nombre_cadena">
               </div>
          </div>
          </div>
          <br>
          <br>

          <!-- Fin Agregar Cadena -->
          <div align="center">
                  <div id="entradaTexto">
                    {{ Form::button(' Actualizar Variedad ', array('type' => 'submit', 'class' => 'boton')) }} 
                    </div>
           </div>
        {{ Form::close() }}
        </div>
    </div>
</div>

  
        </div>
        <br>




 
@stop