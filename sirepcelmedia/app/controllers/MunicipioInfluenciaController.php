<?php

class MunicipioInfluenciaController extends BaseController{

	//Metodo crear grupo
	public function crearmunicipioinfluencia(){
		for ($i=0; $i < 1000; $i++) { 

		$departamento = Departamento::find(8);	
		$municipio = Municipio::find(8);
		$influencia = Municipio::find(9);	

		$municipioinfluencia = new MunicipioInfluencia;
		$municipioinfluencia->prioridad=1;

		$municipioinfluencia->municipio()->associate($municipio);
		$municipioinfluencia->influencia()->associate($influencia);
		$municipioinfluencia->departamento()->associate($departamento);

		$municipioinfluencia->save();

		}
	}

	public function eliminarmunicipioinfluencia(){
		$id= 7;
		$municipioinfluencia = MunicipioInfluencia::find($id);
		$municipioinfluencia->delete();
	}

		public function actualizarmunicipioinfluencia(){

		$mercado = MunicipioInfluencia::find(8);
		$mercado->prioridad=2;
		$mercado->save();
	}

} 

?>