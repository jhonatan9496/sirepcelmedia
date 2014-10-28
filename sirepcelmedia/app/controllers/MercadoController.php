<?php

class MercadoController extends BaseController{

	//Metodo crear grupo
	public function crearmercado(){
		for ($i=0; $i < 100; $i++) { 

		$departamento = Departamento::find(8);	
		$municipio = Municipio::find(8);	

		$mercado = new Mercado;
		$mercado->nombre_mercado='Mercado insert';

		$mercado->municipio()->associate($municipio);
		$mercado->departamento()->associate($departamento);

		$mercado->save();

		}
	}

	public function eliminarmercado(){
		$id= 7;
		$mercado = Mercado::find($id);
		$mercado->delete();
	}

		public function actualizarmercado(){

		$mercado = Mercado::find(8);
		$mercado->nombre_mercado='Mercado Update';
		$mercado->save();
	}

} 

?>