@extends('base')

@section('titulo') Sirep Agregar Productos  @stop

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
        <div>
            <a href="{{ url('/ListaVariedades') }}"><button class="boton">Lista</button></a>
            <button class="boton">Eliminar</button>
        </div>
        <br>
            {{ Form::open(array('action' => 'VariedadController@crearvariedad', 'method' => 'GET'), array('role' => 'form')) }}
        <!-- Agregar Variedad -->

            <div id="cajas">
                <div id="titulos">Agregar Variedad</div><br>
                <div id="entradaTexto">
                  <label>Cadena</label>
                  <br>
                        {{ Form::select('cadena', $cadenas) }}
                </div>
                <div id="entradaTexto">
                <label>Grupo</label><br>
                        {{ Form::select('grupo', $grupos) }}
                </div>
                <div id="entradaTexto">
                <label>Sub-Grupo</label><br>
                        {{ Form::select('subgrupo', $subgrupos) }}
                </div>
                <br>
                <div id="entradaTexto">
                <label>Producto</label><br>
                        {{ Form::select('producto', $productos) }}

                </div>
                <div id="entradaTexto">
                  <label>Nombre Variedad </label>
                    {{ Form::text('nombre_variedad', null, array('placeholder' => 'Introduce variedad','required')) }}
                </div>
                <div id="entradaTexto">
                        {{ Form::button('Agregar Variedad', array('type' => 'submit', 'class' => 'boton')) }} 
                </div>
            </div>
        {{ Form::close() }}
        <br>

         <!-- Agregar Productos -->
        
        {{ Form::open(array('action' => 'ProductoController@crearproducto', 'method' => 'GET'), array('role' => 'form')) }}

            <div id="cajas">
                <div id="titulos">Agregar Productos</div><br>
                   
                <div id="entradaTexto">
                    <label>&nbsp;&nbsp;&nbsp;Sub-Grupo</label>
                        {{ Form::select('subgrupo', $subgrupos) }}
                </div>
                <div id="entradaTexto">
                    <label>Nombre Producto</label>
                        {{ Form::text('nombre_producto', null, array('placeholder' => 'Introduce Producto','required')) }}
                </div>
                <div id="entradaTexto">
                        {{ Form::button('Agregar Producto', array('type' => 'submit', 'class' => 'boton')) }} 
                </div>
            </div>
        {{ Form::close() }}
        <br>
        <!-- Agregar Sub Grupo -->
        {{ Form::open(array('action' => 'SubGrupoController@crearsubgrupo', 'method' => 'GET'), array('role' => 'form')) }}

            <div id="cajas">
                <div id="titulos">Agregar Sub-Grupo</div><br>
                    <div id="entradaTexto">
                        <label>Grupo</label><br>
                       {{ Form::select('grupo', $grupos) }}
                    </div>
                    <div id="entradaTexto">
                        <label>Nombre Sub-Grupo</label>
                        {{ Form::text('nombre_sub_grupo', null, array('placeholder' => 'Introduce SubGrupo','required')) }}
                    </div>
                    <div id="entradaTexto">
                        {{ Form::button('Agregar Sub Grupo', array('type' => 'submit', 'class' => 'boton')) }} 
                    </div> 
            </div>
        {{ Form::close() }}

        <br>
        
        {{-- ////////Formulario Agregar Cadena /////////--}}
        {{ Form::open(array('action' => 'CadenaController@crearcadena', 'method' => 'GET','class'=>'cadenagrupo'), array('role' => 'form')) }}

            <div style="display:inline-table; width:442px; margin-right:10px">
                <div id="cajas">
        				<div id="titulos">Agregar Cadena</div><br>
                            <div id="entradaTexto">
                            <label>Nombre Cadena</label><br>
                            {{ Form::text('nombre_cadena', null, array('placeholder' => 'Introduce Cadena','required')) }}
                            </div>
                    
                            <div id="entradaTexto">
                            {{ Form::button('Agregar Cadena', array('type' => 'submit', 'class' => 'boton')) }} 
        				</div>
                </div>
            </div>
        {{ Form::close() }}
        {{-- //////// Fin Formulario Agregar Cadena /////////--}}


        {{-- ////////Formulario Agregar Grupo /////////--}}
        {{ Form::open(array('action' => 'GrupoController@creargrupo', 'method' => 'GET','class'=>'cadenagrupo'), array('role' => 'form')) }}

              <div style="display:inline-table; width:442px">
                  <div id="cajas">
        				<div id="titulos">Agregar Grupo</div><br>
          				<div id="entradaTexto">
                            <label>Nombre Grupo</label><br>
                            {{ Form::text('nombre_grupo', null, array('placeholder' => 'Introduce Grupo','required')) }}
                        </div>
                    
                            <div id="entradaTexto">
                            {{ Form::button('Agregar Grupo', array('type' => 'submit', 'class' => 'boton')) }} 

        				</div>
                  </div>
              </div>
        {{ Form::close() }}
        {{-- ////////  Fin Formulario Agregar Grupo /////////--}}


        <br>
        


        
    
    
        <br>
    </div>
    
    <br/>
    <br/>
    <br/>
@stop
    
	  