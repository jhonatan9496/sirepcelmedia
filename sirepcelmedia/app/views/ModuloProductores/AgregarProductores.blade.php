@extends('base')

@section('titulo') Sirep Agregar Productor @stop

@section('contenido')
    
    <!--Titulo pagina -->
  	<div id="tiModulos">
        <div style="float:left;" >
            <img src="images/ico_Productores.png" width="30" height="30"/>
        </div>
        <div style="height:30px; float:left; vertical-align:middle; font-size:18px; font-weight:bold; margin-left:10px; padding-top:3px">Productores</div>
    </div>
    <br>
    <!--  Fin titulo Pagina -->
    

     <div id="contenedorResponsive">
         <!-- Buscar Productores -->
        <div id="cajas">
          <div id="titulos">Buscar Productor</div>
            <br>
            {{ Form::open(array('action' => 'ProductorController@buscarproductor', 'method' => 'GET'), array('role' => 'form')) }}

            <div align="center">
                   <div id="entradaTexto">
                        <label>Celular&nbsp;&nbsp;</label>
                        {{ Form::text('celular', null, array('placeholder' => 'Introduce celular')) }}

                   </div>
                   <div id="entradaTexto">
                        <label>Cédula&nbsp;&nbsp;</label>
                        {{ Form::text('cedula', null, array('placeholder' => 'Introduce cedula')) }}
                   </div>
                   <div id="entradaTexto">
                        {{ Form::button('Buscar Productor', array('type' => 'submit', 'class' => 'boton')) }} 
                   </div>
               </div>
            {{ Form::close() }}
        </div>
        <br>
        
     </div>
     <br>
     <!--  Fin buscar Productor -->
     
     <div class="alerta">
El productor no existe en la base de datos.
    </div>
    <br>

     <div id="contenedorResponsive">  
        
        <!-- Agregar Datos Personales -->
        {{ Form::open(array('action' => 'ProductorController@crearproductor', 'method' => 'GET','class'=>'cadenagrupo'), array('role' => 'form')) }}
                <br>
               <div id="titulos" style="text-align: center;"> Agregar Productor</div>
               <br>
                <br>
  
            <div id="cajas" align="left">
               <div id="titulos"> Datos Personales</div>
               <br>
               
               <div id="entradaTexto">
                    <label>Primer Nombre</label>
                    <br>
                    {{ Form::text('primer_nombre', null, array('placeholder' => 'Introduce Nombre','required')) }}

               </div>
               <div id="entradaTexto">
                    <label>Segundo Nombre</label>
                    <br>
                    {{ Form::text('segundo_nombre', null, array('placeholder' => 'Introduce Nombre')) }}
               </div>
               <div id="entradaTexto">
                    <label>Primer Apellido</label>
                    <br>
                    {{ Form::text('primer_apellido', null, array('placeholder' => 'Introduce apellido','required')) }}
               </div>
               <div id="entradaTexto">
                    <label>Segundo Apellido</label>
                    <br>
                    {{ Form::text('segundo_apellido', null, array('placeholder' => 'Introduce apellido','required')) }}
               </div>
               <div id="entradaTexto">
                    <label>Cédula</label>
                    <br>
                    {{ Form::text('cedula', null, array('placeholder' => 'Introduce Nombre','required')) }}
               </div>
               <div id="entradaTexto">
                    <label>Email</label>
                    <br>
                    {{ Form::text('correo', null, array('placeholder' => 'Introduce Nombre','required')) }}
               </div>
               
               <div id="entradaTexto">
                    <label>Profesion</label>
                    <br>
                    {{ Form::text('profesion', null, array('placeholder' => 'Introduce profesion','required')) }}
               </div>
               <div id="entradaTexto">
                    <label>Asistente Técnico</label><br>
                   <select name="asistente_tecnico">
                        <option value="valor1">Si</option>
                        <option value="valor2">No</option>
        			</select>
               </div>
               <div id="entradaTexto">
                    <label>Celular</label>
                    <br>
                    {{ Form::text('celular', null, array('placeholder' => 'Introduce celular','required')) }}
               </div>
               
               <div id="entradaTexto">
                   <label> Operador</label><br>
                        {{ Form::select('operador', $operadores) }}
               </div>
               
               <div id="entradaTexto">
                   <label>Fuente</label><br>
                    {{ Form::select('fuente', $fuentes) }}
               </div>
               <div id="entradaTexto">
                <label>Fecha Registro</label>
                <br>
                    {{ Form::text('fecha_inscripcion', null, array('type' => 'date','required')) }}
               </div>
                <br>
    		</div>
            <br>
            
            <!-- Agregar Ubicación -->
    		<div id="cajas" align="left">
                <div id="titulos">Ubicación</div>
                <div id="entradaTexto">
                    <label>Departamento</label><br>
                    {{ Form::select('departamento', $departamentos) }}
                </div>
               
                <div id="entradaTexto">
                    <label>Municipio</label><br>
                    {{ Form::select('municipios', $municipios) }}
                </div>
               
                <div id="entradaTexto">
                    <label>Vereda</label><br>
                    {{ Form::text('vereda', null, array('placeholder' => 'Introduce vereda','required')) }}

                </div>
               
                <div id="entradaTexto">
                   <label>Finca</label>
                   <br>
                    {{ Form::text('finca', null, array('placeholder' => 'Introduce finca','required')) }}
                </div>
    	    </div>
            <br>
            
            
            <!-- Agregar Ubicación -->
    		<div id="cajas" align="center">
                <div id="titulos">Actividad Agropecuaria</div>
                <br>
                <div align="right" style="display:inline-table; width:30%; vertical-align:middle">
                    <div id="entradaTexto">
                        <label>Actividad Principal&nbsp;&nbsp;</label><br>
                        {{ Form::select('actividad', $actividades) }}
                    </div>
                    <br>
                   
                    <div id="entradaTexto">
                        <label>Tecnificación&nbsp;&nbsp;</label><br>
                        {{ Form::select('tecnificacion', array('Alto' => 'Alto','Medio' => 'Medio','Bajo' => 'Bajo')) }}
                    </div>
                    
                     <div id="entradaTexto">
                    <label>Producto/Variedad&nbsp;&nbsp;</label><br>
                    {{Form::select('animal', array(
                            'Papa' => array('Tocarrena' => 'Papa pastusa'),
                            'lechuga' => array('crespa' => 'Crespa'),
                        ))}}
                        {{ Form::select('variedades', $variedades) }}

                        <br>
                    </div>
                    <div id="entradaTexto">
                        <input type="button" value="Agregar" class="boton">
            		</div>
                </div>

                <!-- tabla dinamica -->
                <div style="display:inline-table; width:447px; height:200;  vertical-align:top; margin-top:15px">
                 <!-- aqui se ejecuta el While para que se repita mientras exista -->
                   <div style="overflow: auto; width:447; height:134px">
                    <table style="width:430px; text-align: left" border="1" bordercolor="#9C9" cellpadding="0" cellspacing="0">
                    <!-- aqui se ejecuta el while -->
                    <tr>
                        <td id="celEsp"  width="75%" style="padding-left:10px">producto x</td>
                        <td id="celEsp" width="25%" style=" background-color:#FFF; text-align:center"><a href=""><font color="#000000"><strong>Eliminar</strong></font></a></td>
                    </tr>
                     <tr>
                        <td id="celEsp"  width="75%" style="padding-left:10px">producto x</td>
                        <td id="celEsp" width="25%" style=" background-color:#FFF; text-align:center"><a href=""><font color="#000000"><strong>Eliminar</strong></font></a></td>
                    </tr>
                    
                    <!-- -->
                    </table> 
                    </div>
                </div>
    		</div>
            <br>
            
            
            
             <!-- Iformacion de Interes -->
    		<div id="cajas" align="left">
                <div id="titulos">Información de Interes</div>
                <br>
               <div id="entradaTexto">
                    <label>Asistencia Técnica</label><br>
                    <input name="" type="checkbox" value="" class="CheckBox">
               </div>
               
               <div id="entradaTexto">
               <label>Asociatividad Organización</label><br>
               <input name="" type="checkbox" value="" class="CheckBox">
               </div>
               
               <div id="entradaTexto">
               <label>Crédito</label><br>
               <input name="" type="checkbox" value="" class="CheckBox">
               </div>
               
               <div id="entradaTexto">
               <label>Poscosecha Manejo</label><br>
               <input name="" type="checkbox" value="" class="CheckBox">
               </div>
               
               <div id="entradaTexto">
               <label>Precios Mercados</label><br>
               <input name="" type="checkbox" value="" class="CheckBox">
               </div>
               
               <div id="entradaTexto">
               <label>Qué Cultivar</label><br>
               <input name="" type="checkbox" value="" class="CheckBox">
               </div>
               
               <div id="entradaTexto">
               <label>Tecnologías</label><br>
               <input name="" type="checkbox" value="" class="CheckBox">
               </div>
               
               
               <div id="entradaTexto">
               <label>Temas Ambientales</label><br>
               <input name="" type="checkbox" value="" class="CheckBox">
               </div>
               
               
               <div id="entradaTexto">
               <button class="boton">Seleccionar Todos</button>
               </div>
               
               
               
    	</div>
            <br>
            
            
            
           <!-- Botones -->
           <div align="center">
            {{ Form::button('Guardar Productor', array('type' => 'submit', 'class' => 'boton')) }} 
           <button class="boton">Limpiar Formulario</button>
            </div>
            
        </form>
        
        </div>
        <br>
        <br>
        <br>
        <br>
        
@stop
