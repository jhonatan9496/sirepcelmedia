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
	<br/>
    <br/>
    <div align="center">
		<img src="images/SIREP-LOGO.png" width="400"/>
    </div>
    <br/>
    
	<div id="formulario" align="center">

		{{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
        @if(Session::has('mensaje_error'))
  <div class="alerta">
            {{ Session::get('mensaje_error') }}
			</div>

        @endif

        {{ Form::open(array('url' => '/login')) }}
			
	        
			<label>Usuario:</label><br>
		{{ Form::text('username', null, array('placeholder' => 'usuario', 'class' => 'form-control','required')) }}
	        <br/>
						

			<label>Contraseña:</label><br>
			  {{ Form::password('password', array('class' => 'form-control','required')) }}
	        <br>

			<div class="checkbox">
				<label>{{ Form::checkbox('rememberme', true) }}Recuerdame</label>
			</div>
	        <br/>

	        <a href="{{ url('/Menu') }}"> 
			{{ Form::button('Iniciar Sessión', array('type' => 'submit', 'class' => 'boton')) }} 
			</a>
		{{ Form::close() }}
	</div>
	<br/>
	<br/>
	<br/>
	<br/>
	
    <div id="piePagina" >
		Desarrollado por Celmedia MKT S.A.
	</div>
</div>

</body>
</html>