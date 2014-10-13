<?php

class FuenteController extends BaseController{

	//Metodo crear grupo
	public function crearfuente(){
		for ($i=0; $i < 100; $i++) { 

		$fuente = new Fuente;
		$fuente->nombre_fuente='Mercado insert';

		$fuente->save();

		}
	}

	public function eliminarfuente(){
		$id= 7;
		$fuente = Fuente::find($id);
		$fuente->delete();
	}

		public function actualizarfuente(){

		$fuente = Fuente::find(8);
		$fuente->nombre_fuente='Fuente Update';
		$fuente->save();
	}

} 

?>