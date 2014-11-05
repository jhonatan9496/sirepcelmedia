@extends('base')

@section('titulo') Sirep Agregar Productos  @stop

@section('contenido')

<div>
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
            <div>
                <a href="{{ url('/ListarVariedades') }}">
                    <button class="boton">Lista</button>
                </a>
            </div>
            <br>
        
        <!-- Agregar Cadena -->

        {{ Form::open(array('url' => 'guardarvariedad','class' => 'register_ajax')) }}

           <!-- Agregar  Variedad  -->
        <div style="display:inline-table; width:100%">
              <div id="cajas">
                    <div id="titulos">Variedad</div><br>
                        <div id="entradaTexto">
                        <div style="height:20px; vertical-align: top"><label>Nombre Variedad</label></div>
                        <input type="text" name="nombre_variedad" required>
                        </div>
                        <div id="entradaTexto">
                        <div style="height:20px; vertical-align: top"><label>Codigo Dane</label>
                        </div>
                        <input type="text" name="codigo_dane" required>
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
                    {{ Form::button(' Agregar Variedad ', array('type' => 'submit', 'class' => 'boton')) }} 
                    </div>
           </div>
        {{ Form::close() }}


</div>
    

@stop
    
    
    

    
    
  
    
    
