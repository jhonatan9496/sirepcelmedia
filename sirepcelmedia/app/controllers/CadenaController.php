<?php

class CadenaController extends BaseController{
	
	public function crearcadena(){
		//for ($i=0; $i < 300; $i++) { 
		//$cadena = new Cadena;
		//$cadena->nombre_cadena='Cadena ';
		//$cadena->descripcion_cadena='des descripcion_cadena';
		//$cadena->save();
		//}
		$cadena = new Cadena;
		$cadena->nombre_cadena=Input::get('nombre_cadena');
		$cadena->save();

		return Redirect::to('/AddProducto');
		
	}

	public function eliminarcadena(){
		$id= 1;
		$cadena = Cadena::find($id);
		$cadena->delete();
		
	}

		public function actualizarcadena(){
			$cadena_id=4;
		$cadena = Cadena::find($cadena_id);
		$cadena->nombre_cadena='Cadena actualizado ';
		$cadena->descripcion_cadena='cadena actualizar';
		$cadena->save();
	}
	
}