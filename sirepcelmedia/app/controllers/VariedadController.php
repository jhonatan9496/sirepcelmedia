<?php

class VariedadController extends BaseController{

	//Metodo crear grupo
	public function crearvariedad(){

		

		$cadena = Cadena::find(Input::get('cadena'));
		$subgrupo = SubGrupo::find(Input::get('subgrupo'));
		$grupo = Grupo::find(Input::get('grupo'));
		$producto = Producto::find(Input::get('producto'));

		$variedad = new Variedad;
		$variedad->nombre_variedad=Input::get('nombre_variedad');

		$variedad->subgrupo()->associate($subgrupo);
		$variedad->cadena()->associate($cadena);
		$variedad->grupo()->associate($grupo);
		$variedad->producto()->associate($producto);

		$variedad->save();


		return Redirect::to('/AddProducto');
		
	}

	public function eliminarvariedad(){
		$id= 5;
		$variedad = Variedad::find($id);
		$variedad->delete();
		
	}

		public function actualizarvariedad(){
		$variedad = Variedad::find(1);
		$variedad->nombre_variedad='Variedad Actualizar';
		$variedad->save();
	}

	public  function listarvariedad(){

		$cadena=Cadena::all()->lists('nombre_cadena','id');
		$grupos=Grupo::all()->lists('nombre_grupo','id');
		$subgrupos=SubGrupo::all()->lists('nombre_sub_grupo','id');
		$productos=Producto::all()->lists('nombre_producto','id');

		$variedades=DB::table('variedades')
            ->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto')
            ->get();

		return View::make('ModuloProductos.ListarProductos',array('cadenas'=>$cadena,'produc'=>$variedades,'grupos'=>$grupos,'subgrupos'=>$subgrupos,'productos'=>$productos));

            return $consulta;

/*

		$variedades=Variedad::all();
		$cadena=Cadena::all();
		$grupos=Grupo::all()->lists('nombre_grupo','id');
		$subgrupos=SubGrupo::all()->lists('nombre_sub_grupo','id');
		$productos=Producto::all()->lists('nombre_producto','id');
		
		foreach ($variedades as $cadavariedad) {
			foreach ($cadena as $key) {
				if ($key->id == $cadavariedad->cadena_id) {
		$cadavariedad += $cadavariedad + 'q'->'q';

		return $cadavariedad;
		return View::make('ModuloProductos.ListarProductos',array('cadenas'=>$cadena,'produc'=>$variedades,'grupos'=>$grupos,'subgrupos'=>$subgrupos,'productos'=>$productos));
					
				}			
			}
		}
		*/

		//$cadenas=Cadena::find($variedades->cadena_id)->lists('nombre_cadena','id');
		//return View::make('ModuloProductos.ListarProductos',array('cadenas'=>$cadena,'produc'=>$variedades,'grupos'=>$grupos,'subgrupos'=>$subgrupos,'productos'=>$productos,'cadenas'=>$cadenas));
	}

} 

?>