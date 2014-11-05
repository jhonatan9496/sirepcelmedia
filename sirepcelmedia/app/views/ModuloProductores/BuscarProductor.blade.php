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

        {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
        @if(Session::has('mensaje_error'))
  <div class="alerta">
            {{ Session::get('mensaje_error') }}
            </div>

        @endif

        <br>

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

        
@stop
