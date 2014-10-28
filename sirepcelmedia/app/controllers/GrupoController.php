<?php

class GrupoController extends BaseController{
	
	public function creargrupo(){
		/*
		for ($i=0; $i <50 ; $i++) { 
		$grupo = new Grupo;
		$grupo->nombre_grupo='grupo1';
		$grupo->descripcion_grupo='des grupo1';
		$grupo->save();
		}
		*/
		$grupo = new Grupo;
		$grupo->nombre_grupo=Input::get('nombre_grupo');
		$grupo->save();

		return Redirect::to('/AddProducto');

	}


	public function eliminargrupo(){
		$id= 2;
		$grupo = Grupo::find($id);
		$grupo->delete();
	}

		public function actualizargrupo(){
		$id =4;
		$grupo = Grupo::find($id);
		$grupo->nombre_grupo='Sub Grupo actualizado ';
		$grupo->descripcion_grupo='Descripcion de grupo actualizar';
		$grupo->save();
	}
	
}