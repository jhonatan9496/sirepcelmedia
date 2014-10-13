<?php

class SubGrupoController extends BaseController{
	
	public function crearsubgrupo(){
/*
		for ($i=0; $i < 500; $i++) { 
		$grupo = Grupo::find(1);
		$subgrupo = new SubGrupo;
		$subgrupo->nombre_sub_grupo='Sub Grupo ';
		$subgrupo->descripcion_sub_grupo='Descripcion de subgrupo';
		$subgrupo->grupo()->associate($grupo);
		$subgrupo->save();
		}
*/
		$grupo = Grupo::find(Input::get('grupo'));
		$subgrupo = new SubGrupo;
		$subgrupo->nombre_sub_grupo=Input::get('nombre_sub_grupo');
		$subgrupo->grupo()->associate($grupo);
		$subgrupo->save();

		return Redirect::to('/AddProducto');

		//return Response::json(SubGrupo::all());

	}

	public function actualizarsubgrupo(){
		$subgrupo_id =4;
		$subgrupo = SubGrupo::find($subgrupo_id);
		$subgrupo->nombre_sub_grupo='Sub Grupo actualizado ';
		$subgrupo->descripcion_sub_grupo='Descripcion de subgrupo actualizar';
		$subgrupo->save();
	}

	public function eliminarsubgrupo(){
		$subgrupo_id=1;
		$subgrupo =  SubGrupo::find($subgrupo_id);
		$subgrupo->delete();
	}
}