<?php

class ActividadController extends BaseController{

	//Metodo crear grupo
	public function crearactividad(){
		for ($i=0; $i < 100; $i++) { 

		$actividad = new Actividad;
		$actividad->nombre_actividad='Actividad insert';

		$actividad->save();

		}
	}

	public function eliminaractividad(){
		$id= 7;
		$actividad = Actividad::find($id);
		$actividad->delete();
	}

		public function actualizaractividad(){

		$actividad = Actividad::find(8);
		$actividad->nombre_actividad='Actividad Update';
		$actividad->save();
	}

} 

?>