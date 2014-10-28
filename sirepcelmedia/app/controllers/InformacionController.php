<?php

class InformacionController extends BaseController{

	//Metodo crear grupo
	public function crearinformacion(){
		for ($i=0; $i < 100; $i++) { 

		$informacion = new Informacion;
		$informacion->nombre_informacion='Actividad insert';

		$informacion->save();

		}
	}

	public function eliminarinformacion(){
		$id= 7;
		$actividad = Actividad::find($id);
		$actividad->delete();
	}

		public function actualizarinformacion(){

		$actividad = Actividad::find(8);
		$actividad->nombre_actividad='Actividad Update';
		$actividad->save();
	}

} 

?>