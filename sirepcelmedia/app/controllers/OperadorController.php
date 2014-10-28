<?php

class OperadorController extends BaseController{

	//Metodo crear grupo
	public function crearoperador(){
		for ($i=0; $i < 100; $i++) { 

		$operador = new Operador;
		$operador->nombre_operador='Operador insert';

		$operador->save();

		}
	}

	public function eliminaroperador(){
		$id= 7;
		$operador = Operador::find($id);
		$operador->delete();
	}

		public function actualizaroperador(){

		$operador = Operador::find(8);
		$operador->nombre_operador='Operador Update';
		$operador->save();
	}

} 

?>