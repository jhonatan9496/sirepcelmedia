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
			
	        
			<label>Usuario:</label><br>
		{{ Form::text('email', null, array('placeholder' => 'usuario', 'class' => 'form-control')) }}
	        <br/>
						

			<label>Contraseña:</label><br>
			  {{ Form::password('password', array('class' => 'form-control')) }}
	        <br>

			<div class="checkbox">
				<label><input type="checkbox">Recuerdame</label>
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