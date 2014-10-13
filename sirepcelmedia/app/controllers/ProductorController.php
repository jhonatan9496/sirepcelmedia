<?php

class ProductorController extends BaseController{

	//Metodo crear grupo
	public function crearproductor(){
		
		$actividad = Actividad::find(Input::get('actividad'));
		$fuente = Fuente::find(Input::get('fuente'));
		$crea = User::find(1);
		$actualiza = User::find(2);
		$municipio = Municipio::find(Input::get('municipios'));
		$departamento = Departamento::find(Input::get('departamento'));
		$operador = Operador::find(Input::get('operador'));

		$variedades = Variedad::all()->lists('nombre_variedad','id');


		$productor = new Productor;

		$productor->primer_nombre=Input::get('primer_nombre');
		$productor->segundo_nombre=Input::get('segundo_nombre');
		$productor->primer_apellido=Input::get('primer_apellido');
		$productor->segundo_apellido=Input::get('segundo_apellido');
		$productor->cedula=Input::get('cedula');
		$productor->celular=Input::get('celular');
		$productor->correo=Input::get('correo');
		$productor->vereda=Input::get('vereda');
		$productor->finca=Input::get('finca');
		$productor->profesion=Input::get('profesion');
		$productor->tecnificacion=Input::get('tecnificacion');
		$productor->fecha_inscripcion=Input::get('fecha_inscripcion');
		$productor->fuente=Input::get('fuente');
		$productor->codigo_productor='FALTA';
		$productor->asistente_tecnico=Input::get('asistente_tecnico');
		$productor->ultima_actualizacion='date Falta';
		$productor->eliminado='asdfasdfas';

		$productor->actividad()->associate($actividad);
		$productor->fuente()->associate($fuente);
		$productor->crea()->associate($crea);
		$productor->actualiza()->associate($actualiza);
		$productor->municipio()->associate($municipio);
		$productor->departamento()->associate($departamento);
		$productor->operador()->associate($operador);

		$productor->save();

		//return Redirect::to('/AddProductor');
		return View::make('ModuloProductores/ModificarProductor',array('alert' =>'Productor guardado','productorActualizar'=>$productor,'variedades'=>$variedades,'actividades'=>$actividad,'municipios'=>$municipio,'departamentos'=>$departamento,'operadores'=>$operador,'fuentes'=>$fuente));

	}


	public function actualizarproductor(){
			$operadores = Operador::all()->lists('nombre_operador','id');
			$fuentes = Fuente::all()->lists('nombre_fuente','id');
			$departamentos  = Departamento::all()->lists('nombre_departamento','id');
			$municipios = Municipio::all()->lists('nombre_municipio','id');
			$actividades = Actividad::all()->lists('nombre_actividad','id');

			$variedades = Variedad::all()->lists('nombre_variedad','id');
		
		$productor = Productor::find(Input::get('id'));
		$productor->primer_nombre=Input::get('primer_nombre');
		$productor->segundo_nombre=Input::get('segundo_nombre');
		$productor->primer_apellido=Input::get('primer_apellido');
		$productor->segundo_apellido=Input::get('segundo_apellido');
		$productor->cedula=Input::get('cedula');
		$productor->celular=Input::get('celular');
		$productor->correo=Input::get('correo');
		$productor->vereda=Input::get('vereda');
		$productor->finca=Input::get('finca');
		$productor->profesion=Input::get('profesion');
		$productor->tecnificacion=Input::get('tecnificacion');
		$productor->fecha_inscripcion=Input::get('fecha_inscripcion');
		$productor->fuente=Input::get('fuente');
		$productor->codigo_productor='FALTA';
		$productor->asistente_tecnico=Input::get('asistente_tecnico');
		$productor->ultima_actualizacion='date Falta';
		$productor->eliminado='asdfasdfas';
		$productor->save();

		return View::make('ModuloProductores/ModificarProductor',array('alert' =>'Productor Actualizado','productorActualizar'=>$productor,'variedades'=>$variedades,'actividades'=>$actividades,'municipios'=>$municipios,'departamentos'=>$departamentos,'operadores'=>$operadores,'fuentes'=>$fuentes));

	}

	public function eliminarproductor(){
		$producto =  Productor::find(3);
		$producto->delete();
	}

	public function buscarproductor(){
		$productor =  Productor::where('cedula' , '=', Input::get('cedula'))->first();
		$productorCel =  Productor::where('celular' , '=', Input::get('celular'))->first();

		
		if ($productor||$productorCel) {


			$operadores = Operador::all()->lists('nombre_operador','id');
			$fuentes = Fuente::all()->lists('nombre_fuente','id');
			$departamentos  = Departamento::all()->lists('nombre_departamento','id');
			$municipios = Municipio::all()->lists('nombre_municipio','id');
			$actividades = Actividad::all()->lists('nombre_actividad','id');

			$variedades = Variedad::all()->lists('nombre_variedad','id');
			//return 'el productor existe'.$productor;
			if ($productor) {
			return View::make('ModuloProductores/ModificarProductor',array('alert' =>'Productor Encontrado','productorActualizar'=>$productor,'variedades'=>$variedades,'actividades'=>$actividades,'municipios'=>$municipios,'departamentos'=>$departamentos,'operadores'=>$operadores,'fuentes'=>$fuentes));
			}elseif ($productorCel) {
			return View::make('ModuloProductores/ModificarProductor',array('alert' =>'Productor Encontrado','productorActualizar'=>$productorCel,'variedades'=>$variedades,'actividades'=>$actividades,'municipios'=>$municipios,'departamentos'=>$departamentos,'operadores'=>$operadores,'fuentes'=>$fuentes));
			}
			
		}else {
			return Redirect::to('/AddProductor');
		}
	}

	public  function listarsubgrupos($grupo_id){

		
	}


} 

?>

