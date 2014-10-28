<?php

class MunicipioController extends BaseController{

	//Metodo crear grupo
	public function crearmunicipio(){
		for ($i=0; $i < 100; $i++) { 

		$departamento = Departamento::find(1);	

		$municipio = new Municipio;
		$municipio->nombre_municipio='Municipios  ';
		$municipio->departamento()->associate($departamento);
		$municipio->save();

		}
	}

	public function eliminarmunicipio(){
		$id= 7;
		$municipio = Municipio::find($id);
		$municipio->delete();
	}

		public function actualizarmunicipio(){

		$municipio = Municipio::find(8);
		$municipio->nombre_municipio='municio Actualizado ';
		$municipio->save();
	}

} 

?>