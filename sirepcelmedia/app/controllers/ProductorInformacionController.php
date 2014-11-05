<?php

class ProductorInformacionController extends BaseController{
	
	public function crearinformacionproductor(){

		$productor_informacion = Grupo::find(Input::get('grupo'));
		$productor_informacion = new SubGrupo;
		$productor_informacion->nombre_sub_grupo=Input::get('nombre_sub_grupo');
		$productor_informacion->grupo()->associate($grupo);
		$productor_informacion->save();

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