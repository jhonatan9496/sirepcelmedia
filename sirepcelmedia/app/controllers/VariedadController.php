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

public function guardarvariedad(){
    
 //comprobamos si es una petición ajax
    if(Request::ajax()){

    	if (Input::get('nuevo_grupo')&&Input::get('nuevo_subgrupo')&&Input::get('check_producto')) {

    		//Validar si existe una variedad con ese nombre
    		$validarVariedad = DB::table('variedades')->where('nombre_variedad', Input::get('nombre_variedad'))->first();
			
			if ($validarVariedad) {
				return array('resultado' => 'Ya existe una variedad con este nombre,No se ha creado la variedad');
			}
			//Validar si existe un Gupo con ese nombre
    		$validarGrupo = DB::table('grupos')->where('nombre_grupo', Input::get('nombre_grupo'))->first();
			
			if ($validarGrupo) {
				return array('resultado' => 'Ya existe un Grupo con este nombre,No se ha creado la variedad');
			}
			//Validar si existe un sub Gupo con ese nombre
    		$validarSubGrupo = DB::table('sub_grupos')->where('nombre_sub_grupo', Input::get('nombre_subgrupo'))->first();
			
			if ($validarSubGrupo) {
				return array('resultado' => 'Ya existe un SubGrupo con este nombre,No se ha creado la variedad');
			}
			//Validar si existe un Productos con ese nombre
    		$validarProducto = DB::table('productos')->where('nombre_producto', Input::get('nuevo_producto'))->first();
			
			if ($validarProducto) {
				return array('resultado' => 'Ya existe un Producto con este nombre,No se ha creado la variedad');
			}

			if (Input::get('check_cadena')) {
				//Validar si existe una Cadena con ese nombre
    			$validarCadena = DB::table('cadenas')->where('nombre_cadena', Input::get('nombre_cadena'))->first();
			
				if ($validarCadena) {
					return array('resultado' => 'Ya existe una Cadena con este nombre,No se ha creado la variedad');
				}
	    	}else  {
	    		if (Input::get('cadena')=='seleccionar') {
	    			return array('resultado' => 'Debe Seleccionar o crear una Cadena');
	    		}

	    	}

			$variedad = new Variedad;

			$variedad->nombre_variedad=Input::get('nombre_variedad');
			$variedad->codigo_dane=Input::get('codigo_dane');
			// Crear grupo
	    	$grupo = new Grupo;
			$grupo->nombre_grupo=Input::get('nombre_grupo');
			$grupo->save();
			// recupera id grupos
			$grupos = Grupo::find($grupo->id);
			// Crear Subgrupo
			$subgrupo = new SubGrupo;
			$subgrupo->nombre_sub_grupo=Input::get('nombre_subgrupo');
			$subgrupo->grupo()->associate($grupos);
			$subgrupo->save();
			//  Recupera id Subgrupos
			$subgrupos = SubGrupo::find($subgrupo->id);
			// Crea Producto
			$producto = new Producto;
			$producto->nombre_producto=Input::get('nuevo_producto');
			$producto->subgrupo()->associate($subgrupos);
			$producto->save();
			// Recupera id producto
			$productos = Producto::find($producto->id);

			$variedad->grupo()->associate($grupos);
			$variedad->subgrupo()->associate($subgrupos);
			$variedad->producto()->associate($productos);

			// Verificar si es nuevo y lo crear agrega o relaciona 
			if (Input::get('check_cadena')) {

				//Validar si existe un Productos con ese nombre
    			$validarCadena = DB::table('cadenas')->where('nombre_cadena', Input::get('nombre_cadena'))->first();
			
				if ($validarCadena) {
					return array('resultado' => 'Ya existe una Cadena con este nombre,No se ha creado la variedad');
				}

		    	$cadena = new Cadena;
				$cadena->nombre_cadena=Input::get('nombre_cadena');
				$cadena->save();
				$cadenas = Cadena::find($cadena->id);
				$variedad->cadena()->associate($cadenas);
	    	}else{

	    		
			 	$cadena = Cadena::find(Input::get('cadena'));
				$variedad->cadena()->associate($cadena);
	    	}
			$variedad->save();
			return array('resultado' => 'Se creo la variedad');

		}

		if (!Input::get('nuevo_grupo')&&Input::get('nuevo_subgrupo')&&Input::get('check_producto')) {
			
			if (Input::get('select_grupo')=='seleccionar') {
	    			return array('resultado' => 'Debe Seleccionar o crear un Grupo');
	    		}

			//Validar si existe un sub Gupo con ese nombre
    		$validarSubGrupo = DB::table('sub_grupos')->where('nombre_sub_grupo', Input::get('nombre_subgrupo'))->first();
			
			if ($validarSubGrupo) {
				return array('resultado' => 'Ya existe un SubGrupo con este nombre,No se ha creado la variedad');
			}
			//Validar si existe un Productos con ese nombre
    		$validarProducto = DB::table('productos')->where('nombre_producto', Input::get('nuevo_producto'))->first();
			
			if ($validarProducto) {
				return array('resultado' => 'Ya existe un Producto con este nombre,No se ha creado la variedad');
			}
			if (Input::get('check_cadena')) {
				//Validar si existe una Cadena con ese nombre
    			$validarCadena = DB::table('cadenas')->where('nombre_cadena', Input::get('nombre_cadena'))->first();
			
				if ($validarCadena) {
					return array('resultado' => 'Ya existe una Cadena con este nombre,No se ha creado la variedad');
				}
	    	}else  {
	    		if (Input::get('cadena')=='seleccionar') {
	    			return array('resultado' => 'Debe Seleccionar o crear una Cadena');
	    		}

	    	}


			$variedad = new Variedad;

			$variedad->nombre_variedad=Input::get('nombre_variedad');
			$variedad->codigo_dane=Input::get('codigo_dane');

			$grupo = Grupo::find(Input::get('select_grupo'));

			// Crear Subgrupo
			$subgrupo = new SubGrupo;
			$subgrupo->nombre_sub_grupo=Input::get('nombre_subgrupo');
			$subgrupo->grupo()->associate($grupo);
			$subgrupo->save();
			// recupera id subgrupos
			$subgrupos = SubGrupo::find($subgrupo->id);
			// Crea Producto
			$producto = new Producto;
			$producto->nombre_producto=Input::get('nuevo_producto');
			$producto->subgrupo()->associate($subgrupos);
			$producto->save();
			// Recupera id producto
			$productos = Producto::find($producto->id);
			// Asigna llaves
			$variedad->grupo()->associate($grupo);
			$variedad->subgrupo()->associate($subgrupos);
			$variedad->producto()->associate($productos);

			// Verificar si es nuevo y lo crear agrega o relaciona 
			if (Input::get('check_cadena')) {
		    	$cadena = new Cadena;
				$cadena->nombre_cadena=Input::get('nombre_cadena');
				$cadena->save();
				$cadenas = Cadena::find($cadena->id);
				$variedad->cadena()->associate($cadenas);
	    	}else{
			 	$cadena = Cadena::find(Input::get('cadena'));
				$variedad->cadena()->associate($cadena);
	    	}
			$variedad->save();
			return 1;

		}

		if (!Input::get('nuevo_grupo')&& !Input::get('nuevo_subgrupo')&&Input::get('check_producto')) {
			if (Input::get('select_grupo')=='seleccionar') {
	    			return array('resultado' => 'Debe Seleccionar o crear un Grupo');
	    		}
	    	if (Input::get('subgrupo')=='seleccionar') {
	    		return array('resultado' => 'Debe Seleccionar o crear un Sub Grupo');
	    	}

			//Validar si existe un Productos con ese nombre
    		$validarProducto = DB::table('productos')->where('nombre_producto', Input::get('nuevo_producto'))->first();
			
			if ($validarProducto) {
				return array('resultado' => 'Ya existe un Producto con este nombre,No se ha creado la variedad');
			}
			if (Input::get('check_cadena')) {
				//Validar si existe una Cadena con ese nombre
    			$validarCadena = DB::table('cadenas')->where('nombre_cadena', Input::get('nombre_cadena'))->first();
			
				if ($validarCadena) {
					return array('resultado' => 'Ya existe una Cadena con este nombre,No se ha creado la variedad');
				}
	    	}else  {
	    		if (Input::get('cadena')=='seleccionar') {
	    			return array('resultado' => 'Debe Seleccionar o crear una Cadena');
	    		}

	    	}

			$variedad = new Variedad;

			$variedad->nombre_variedad=Input::get('nombre_variedad');
			$variedad->codigo_dane=Input::get('codigo_dane');


			$grupo = Grupo::find(Input::get('select_grupo'));
			$subgrupo = SubGrupo::find(Input::get('subgrupo'));

			
			// Crea Producto
			$producto = new Producto;
			$producto->nombre_producto=Input::get('nuevo_producto');
			$producto->subgrupo()->associate($subgrupo);
			$producto->save();
			// Recupera id producto
			$productos = Producto::find($producto->id);
			// Asigna llaves
			$variedad->grupo()->associate($grupo);
			$variedad->subgrupo()->associate($subgrupo);
			$variedad->producto()->associate($productos);

			// Verificar si es nuevo y lo crear agrega o relaciona 
			if (Input::get('check_cadena')) {
		    	$cadena = new Cadena;
				$cadena->nombre_cadena=Input::get('nombre_cadena');
				$cadena->save();
				$cadenas = Cadena::find($cadena->id);
				$variedad->cadena()->associate($cadenas);
	    	}else{
			 	$cadena = Cadena::find(Input::get('cadena'));
				$variedad->cadena()->associate($cadena);
	    	}
			$variedad->save();
			return 1;

		}


		if (!Input::get('nuevo_grupo')&& !Input::get('nuevo_subgrupo')&& !Input::get('check_producto')) {
			if (Input::get('select_grupo')=='seleccionar') {
	    			return array('resultado' => 'Debe Seleccionar o crear un Grupo');
	    		}
	    	if (Input::get('subgrupo')=='seleccionar') {
	    		return array('resultado' => 'Debe Seleccionar o crear un Sub Grupo');
	    	}
	    	if (Input::get('producto')=='seleccionar') {
	    		return array('resultado' => 'Debe Seleccionar o crear un Producto');
	    	}

			if (Input::get('check_cadena')) {
				//Validar si existe una Cadena con ese nombre
    			$validarCadena = DB::table('cadenas')->where('nombre_cadena', Input::get('nombre_cadena'))->first();
			
				if ($validarCadena) {
					return array('resultado' => 'Ya existe una Cadena con este nombre,No se ha creado la variedad');
				}
	    	}else  {
	    		if (Input::get('cadena')=='seleccionar') {
	    			return array('resultado' => 'Debe Seleccionar o crear una Cadena');
	    		}

	    	}

			$variedad = new Variedad;

			$variedad->nombre_variedad=Input::get('nombre_variedad');
			$variedad->codigo_dane=Input::get('codigo_dane');


			$grupo = Grupo::find(Input::get('select_grupo'));

			$subgrupo = SubGrupo::find(Input::get('subgrupo'));

			// Recupera id producto
			$productos = Producto::find(Input::get('producto'));
			// Asigna llaves
			$variedad->grupo()->associate($grupo);
			$variedad->subgrupo()->associate($subgrupo);
			$variedad->producto()->associate($productos);

			// Verificar si es nuevo y lo crear agrega o relaciona 
			if (Input::get('check_cadena')) {
		    	$cadena = new Cadena;
				$cadena->nombre_cadena=Input::get('nombre_cadena');
				$cadena->save();
				$cadenas = Cadena::find($cadena->id);
				$variedad->cadena()->associate($cadenas);
	    	}else{
			 	$cadena = Cadena::find(Input::get('cadena'));
				$variedad->cadena()->associate($cadena);
	    	}
			$variedad->save();
			return 1;
		}


/*



		// Verificar si es nuevo y lo crear agrega o relaciona 
    	if (Input::get('nuevo_grupo')) {
    		// Crear grupo
	    	$grupo = new Grupo;
			$grupo->nombre_grupo=Input::get('nombre_grupo');
			$grupo->save();
			// recupera id grupos
			$grupos = Grupo::find($grupo->id);
			// Crear Subgrupo
			$subgrupo = new SubGrupo;
			$subgrupo->nombre_sub_grupo=Input::get('nombre_subgrupo');
			$subgrupo->grupo()->associate($grupos);
			$subgrupo->save();
			//  Recupera id Subgrupos
			$subgrupos = SubGrupo::find($subgrupo->id);
			// Crea Producto
			$producto = new Producto;
			$producto->nombre_producto=Input::get('nuevo_producto');
			$producto->subgrupo()->associate($subgrupos);
			$producto->save();
			// Recupera id producto
			$productos = Producto::find($producto->id);

			$variedad->grupo()->associate($grupos);
			$variedad->subgrupo()->associate($subgrupos);
			$variedad->producto()->associate($productos);
			exit();
    	}elseif (!Input::get('nuevo_grupo')){


			if (Input::get('nuevo_subgrupo')&&!Input::get('nuevo_grupo')) {
			$grupo = Grupo::find(Input::get('select_grupo'));

				// Crear Subgrupo
				$subgrupo = new SubGrupo;
				$subgrupo->nombre_sub_grupo=Input::get('nombre_subgrupo');
				$subgrupo->grupo()->associate($grupo->id);
				$subgrupo->save();
				// recupera id subgrupos
				$subgrupos = SubGrupo::find($subgrupo->id);
				// Crea Producto
				$producto = new Producto;
				$producto->nombre_producto=Input::get('nuevo_producto');
				$producto->subgrupo()->associate($subgrupos);
				$producto->save();
				// Recupera id producto
				$productos = Producto::find($producto->id);
				// Asigna llaves
				$variedad->grupo()->associate($grupo);
				$variedad->subgrupo()->associate($subgrupos);
				$variedad->producto()->associate($productos);
				exit();
			}elseif (!Input::get('nuevo_subgrupo')&&!Input::get('nuevo_grupo')){
			$grupo = Grupo::find(Input::get('select_grupo'));

				$subgrupo = SubGrupo::find(Input::get('subgrupo'));
    			if (Input::get('check_producto')) {
    				// Crea Producto
					$producto = new Producto;
					$producto->nombre_producto=Input::get('nuevo_producto');
					$producto->subgrupo()->associate($subgrupo);
					$producto->save();
					// Recupera id producto
					$productos = Producto::find($producto->id);
					// Asigna llaves
					$variedad->grupo()->associate($grupo);
					$variedad->subgrupo()->associate($subgrupo);
					$variedad->producto()->associate($productos);
					exit();
    			}elseif (!Input::get('check_producto')){
					$producto = Producto::find(Input::get('producto'));
					// Asigna llaves
					$variedad->grupo()->associate($grupo);
					$variedad->subgrupo()->associate($subgrupo->id);
					$variedad->producto()->associate($producto);
					exit();
    			}
			}
    	}


*/

		
    }
		
}



public  function listarvariedades(){
		$variedades=Variedad::all();
		
		$grupos=Grupo::all()->lists('nombre_grupo','id');
		$subgrupos=SubGrupo::all()->lists('nombre_sub_grupo','id');
		$productos=Producto::all()->lists('nombre_producto','id');
		$cadenas=Cadena::all()->lists('nombre_cadena','id');

		$join=DB::table('variedades')
            ->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'variedades.id', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto')
            ->get();

            //return $join;

		return View::make('ModuloProductos.ListaProducto',array('join'=>$join, 'variedades'=>$variedades,'grupos'=>$grupos,'subgrupos'=>$subgrupos,'productos'=>$productos,'cadenas'=>$cadenas));
	}

	

} 

?>