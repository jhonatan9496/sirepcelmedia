<?php

class DepartamentoController extends BaseController{

	//Metodo crear grupo
	public function creardepartamento(){
		for ($i=0; $i < 100000; $i++) { 
		$departamento = new Departamento;
		$departamento->nombre_departamento='Departamento ';
		$departamento->save();

		}

		
	}

	public function eliminardepartamento(){
		$id= 3;
		$departamento = Departamento::find($id);
		$departamento->delete();
		
	}

		public function actualizardepartamento(){

		$departamento = Departamento::find(4);
		$departamento->nombre_departamento='Departamento Actualizado ';
		$departamento->save();
	}

} 

?>