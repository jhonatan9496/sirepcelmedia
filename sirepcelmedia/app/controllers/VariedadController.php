<?php

class VariedadController extends BaseController{

//------------------------------------------------------------
//Metodo crear Variedad
//------------------------------------------------------------
	public function crearvariedad(){
// Captura los id de las llaves foraneas captura por get y fueron enviados por post
		$cadena = Cadena::find(Input::get('cadena'));
		$subgrupo = SubGrupo::find(Input::get('subgrupo'));
		$grupo = Grupo::find(Input::get('grupo'));
		$producto = Producto::find(Input::get('producto'));
// Crea un nuevo objeto variedad 
		$variedad = new Variedad;
		$variedad->nombre_variedad=Input::get('nombre_variedad');
// Despues se Asocial las llaves llamando el metodo que se creo
// En el modelo Variedad que hace referencia al id de cada tabla
		$variedad->subgrupo()->associate($subgrupo);
		$variedad->cadena()->associate($cadena);
		$variedad->grupo()->associate($grupo);
		$variedad->producto()->associate($producto);
// Guardar Variedad con el metodo save
		$variedad->save();
// Despues de Crear Redirecciona a Agregar un producto de nuevo
		return Redirect::to('/AddProducto');
		
	}

//------------------------------------------------------------
//Metodo eliminar Variedad
//------------------------------------------------------------
	public function eliminarvariedad($id){

		$variedad = Variedad::find($id);
		$variedad->delete();

	}

//------------------------------------------------------------
//Metodo actualizar  Variedad
//------------------------------------------------------------
		public function actualizarvariedad($id){
// primero se busca la variedad 
		$variedad = Variedad::find($id);
//  y se le asigna los nuevos valores a la variedad como si se estuviera guardando
		$variedad->nombre_variedad='Variedad Actualizar';
//  Se guarda con el metodo save 
		$variedad->save();
	}
//------------------------------------------------------------
//Metodo Listar   Variedad
// Retorna el vectores de Variedades, Grupos ,cadena , Subgrupos,Productos 
//------------------------------------------------------------
	public  function listarvariedad(){
// Listamos nombre y id de cadena,productos,grupos,subgrupos,productos
// estos vectores se asignan los select  
		$cadena=Cadena::all()->lists('nombre_cadena','id');
		$grupos=Grupo::all()->lists('nombre_grupo','id');
		$subgrupos=SubGrupo::all()->lists('nombre_sub_grupo','id');
		$productos=Producto::all()->lists('nombre_producto','id');
// Consulta construida con join para obtener las variedades con los respectivos
// nombres de las llaves foraneas a las que pertenece 
		$variedades=DB::table('variedades')
            ->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto')
            ->get();
// retornamos la plantilla de listar productos y los vectores que seran asignaos a los select y la informacion de las tablas 

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
//------------------------------------------------------------
//Metodo Guardar   Variedad
//------------------------------------------------------------
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
			return array('resultado' => 'Se Guardo');

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
			return array('resultado' => 'Se Guardo');

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
			return array('resultado' => 'Se Guardo');
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
            ->select('variedades.codigo_dane','variedades.nombre_variedad', 'variedades.id', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto')
            ->get();

            //return $join;

		return View::make('ModuloProductos.ListaProducto',array('join'=>$join, 'variedades'=>$variedades,'grupos'=>$grupos,'subgrupos'=>$subgrupos,'productos'=>$productos,'cadenas'=>$cadenas));
	}



	public  function filtrarvariedad(){

		if (Input::get('eliminar')) {
			$variable = Input::get('eliminar');

			foreach ($variable as $key ) {
				$variedad = Variedad::find($key);
				$variedad->delete();
			}


			// Volver a listar
			$filtrar_cadena = DB::table('variedades')
			->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'variedades.id', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto');

			return array('vector' => $filtrar_cadena,'filtro'=>'cadena');
		}


        // ------------------------------------------
        //      Resultado Filtro solo cadena
        //  ------------------------------------------
		if (Input::get('cadena')&&Input::get('cadena')!='seleccionar'&& !Input::get('filtra_variedad')) {
			$filtrar_cadena = DB::table('variedades')
			->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'variedades.id', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto')
			->where('cadena_id', Input::get('cadena'))->get();

			return array('vector' => $filtrar_cadena,'filtro'=>'cadena');
		// ------------------------------------------
        //      Resultado Filtro solo Nombre
        //  ------------------------------------------
		}elseif (Input::get('filtra_variedad')&& Input::get('cadena')=='seleccionar' &&Input::get('select_grupo')=='seleccionar'){
			$filtrar_cadena = DB::table('variedades')
			->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'variedades.id', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto')
			->where('nombre_variedad','LIKE', '%'.Input::get('filtra_variedad').'%')->get();

			return array('vector' => $filtrar_cadena,'filtro'=>'nombre');
		// ------------------------------------------
        //      Resultado Filtro solo Nombre y Cadena
        //  ------------------------------------------
		}elseif (Input::get('filtra_variedad')&& Input::get('cadena')!='seleccionar' && Input::get('cadena')){
			$filtrar_cadena = DB::table('variedades')
			->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'variedades.id', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto')
			->where('nombre_variedad','LIKE', '%'.Input::get('filtra_variedad').'%')
			->where('cadena_id', Input::get('cadena'))
			->get();

			return array('vector' => $filtrar_cadena,'filtro'=>'nombre y cadena');

		// ------------------------------------------
        //      Resultado Filtro Grupo, subgrupo , Producto
        //  ------------------------------------------
		}elseif (!Input::get('filtra_variedad') && Input::get('select_grupo')!='seleccionar'){

			$filtrar_cadena = DB::table('variedades')
			->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'variedades.id', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto')
			->where('variedades.grupo_id', Input::get('select_grupo'));
			// Agregamos filtro sub grupo
			if (Input::get('subgrupo')!='seleccionar') {
				$filtrar_cadena->where('variedades.subgrupo_id', Input::get('subgrupo'));
			}
			// Agregamos filtro Producto
			if (Input::get('producto')!='seleccionar') {
				$filtrar_cadena->where('variedades.producto_id', Input::get('producto'));
			}
			
			$resultado= $filtrar_cadena->get();

			return array('vector' => $resultado,'filtro'=>'grupo , sub grupo ,Producto');
		

		// ------------------------------------------
        //      Resultado Filtro Grupo y texto , subgrupo , Producto 
        //  ------------------------------------------
		}elseif ( Input::get('filtra_variedad') && Input::get('select_grupo')!='seleccionar'){

			//return array('filtro'=>'entro');

		$filtrar_cadena = DB::table('variedades')
			->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'variedades.id', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto')
			->where('variedades.grupo_id', Input::get('select_grupo'))
			->where('nombre_variedad','LIKE', '%'.Input::get('filtra_variedad').'%');
			// Agregamos filtro sub grupo
			if (Input::get('subgrupo')!='seleccionar') {
				$filtrar_cadena->where('variedades.subgrupo_id', Input::get('subgrupo'));
			}
			// Agregamos filtro Producto
			if (Input::get('producto')!='seleccionar') {
				$filtrar_cadena->where('variedades.producto_id', Input::get('producto'));
			}
			
			$resultado= $filtrar_cadena->get();

			return array('vector' => $resultado,'filtro'=>'nombre grupo her');
// Sin ningun Filtro
		}else {
			$filtrar_cadena = DB::table('variedades')
			->join('cadenas', 'cadenas.id', '=', 'variedades.cadena_id')
            ->join('grupos', 'grupos.id', '=', 'variedades.grupo_id')
            ->join('sub_grupos', 'sub_grupos.id', '=', 'variedades.subgrupo_id')
            ->join('productos', 'productos.id', '=', 'variedades.producto_id')
            ->select('variedades.nombre_variedad', 'variedades.id', 'cadenas.nombre_cadena','grupos.nombre_grupo','sub_grupos.nombre_sub_grupo','productos.nombre_producto');
			
			$resultado= $filtrar_cadena->get();

			return array('vector' => $resultado,'filtro'=>'sin filtro');

		}

	} // fin filtrar variedad

	

} 

?>