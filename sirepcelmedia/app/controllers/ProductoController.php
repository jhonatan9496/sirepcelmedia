<?php

class ProductoController extends BaseController{

	//Metodo crear grupo
	public function crearproducto(){
/*
		for ($i=0; $i < 1000; $i++) { 
		$subgrupo = SubGrupo::find(1);
		$producto = new Producto;
		$producto->nombre_producto='Nombre Producto';
		$producto->subgrupo()->associate($subgrupo);
		$producto->save();

		}
		*/
		$subgrupo = SubGrupo::find(Input::get('subgrupo'));
		$producto = new Producto;
		$producto->nombre_producto=Input::get('nombre_producto');
		$producto->subgrupo()->associate($subgrupo);
		$producto->save();

		return Redirect::to('/AddProducto');
	}


	public function actualizarproducto(){
		
		$producto = Producto::find(1);
		$producto->nombre_producto='Producto  actualizado ';
		$producto->save();
	}

	public function eliminarproducto(){
		$producto =  Producto::find(3);
		$producto->delete();
	}
/*
	public  function listarproductos(){
		$productos=Producto::all();
		return View::make('ModuloProductos.ListarProductos',array('produc'=>$productos));
	}
*/ 
	// este metodo retorna los productos filtrados por el sub grupo
	public function filtrar_productos($algo){
		if(Request::ajax()){
        	$subgrupos = DB::table('productos')->where('subgrupo_id', '=', $algo)->get();
        	return Response::json(array('subgrupos' => $subgrupos));
  		 }
	}



public  function listarproductos(){
		$productos=DB::table('productos')->select('nombre_producto','id')->get();

		$cadenas=DB::table('cadenas')->select('nombre_cadena','id')->get();
		
		$grupos=DB::table('grupos')->select('grupos.nombre_grupo','grupos.id')->get();
		$subgrupos=DB::table('sub_grupos')->select('sub_grupos.nombre_sub_grupo','sub_grupos.id')->get();
		//$subgrupos=SubGrupo::all()->lists('nombre_sub_grupo','id');

		$join=DB::table('productos')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'productos.subgrupo_id')
            ->join('grupos', 'grupos.id', '=', 'sub_grupos.grupo_id')
            ->select('productos.nombre_producto', 'productos.id', 'sub_grupos.nombre_sub_grupo','grupos.nombre_grupo','sub_grupos.id','grupos.id')
            ->get();

            //return $join;

		return Response::json(array('join'=>$join, 'productos'=>$productos,'grupos'=>$grupos,'subgrupos'=>$subgrupos,'cadenas'=>$cadenas));
	}


} 

?>