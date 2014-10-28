<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//------------------------------------------------------------
//                Modulo Login
//------------------------------------------------------------
Route::get('/', function()
{
	return View::make('Login/login');
});





Route::get('/pruebas', function()
{
$operadores = Operador::all();
return $operadores;

	//return Response::json(SubGrupo::all());
	//return View::make('ModuloProductos/pruebasection');
});



// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');

// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{

	Route::get('/Menu', function(){
		return View::make('Login/menu');
	});
    
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');






//------------------------------------------------------------
//                Modulo productores
//------------------------------------------------------------


Route::get('/AddProductor', function()
{

$operadores = Operador::all()->lists('nombre_operador','id');


$fuentes = Fuente::all()->lists('nombre_fuente','id');
$departamentos  = Departamento::all()->lists('nombre_departamento','id');
$municipios = Municipio::all()->lists('nombre_municipio','id');
$actividades = Actividad::all()->lists('nombre_actividad','id');

$variedades = Variedad::all()->lists('nombre_variedad','id');

	return View::make('ModuloProductores/AgregarProductores',array('variedades'=>$variedades,'actividades'=>$actividades,'municipios'=>$municipios,'departamentos'=>$departamentos,'operadores'=>$operadores,'fuentes'=>$fuentes));
});

Route::get('BuscarProductor', function(){

	return View::make('ModuloProductores/BuscarProductor');
});


//------------------------------------------------------------
//                Modulo Productos
//------------------------------------------------------------

Route::get('/AddProducto', function()
{
	
	$grupos=Grupo::all()->lists('nombre_grupo','id');
	$subgrupos=SubGrupo::all()->lists('nombre_sub_grupo','id');
	$productos=Producto::all()->lists('nombre_producto','id');
	$cadenas=Cadena::all()->lists('nombre_cadena','id');

	return View::make('ModuloProductos/AgregarProductos',array('grupos'=>$grupos,'subgrupos'=>$subgrupos,'productos'=>$productos,'cadenas'=>$cadenas));
});


Route::get('/AgregarVariedad', function(){
	$grupos=Grupo::all()->lists('nombre_grupo','id');
	$cadenas=Cadena::all()->lists('nombre_cadena','id');



    return View::make('ModuloProductos/AgregarVariedad',array('grupos'=>$grupos,'cadenas'=>$cadenas));
});

// esta url es llamada en el java script por ajax
// llama al metodo en el controlador para retornar via json los subgrupos
Route::get('filtrar_subgrupos/{grupo_id}','SubGrupoController@filtrar_subgrupos');

// esta url es llamada en el java script por ajax
// llama al metodo en el controlador para retornar via json los productos
Route::get('filtrar_productos/{subgrupo_id}','ProductoController@filtrar_productos');

//  esta url es llamada por el formulairo de agregar variedad via ajax 
//  y guarda el formulario de variedad en el metodo del controlador



Route::post('guardarvariedad', 'VariedadController@guardarvariedad');



Route::get('listarvariedades', 'VariedadController@listarvariedades');


//------------------------------------------------------------
//                Modulo Envios Masivos 
//------------------------------------------------------------

	Route::get('/EnviosMasivos', function()
{
	return View::make('ModuloEnviosMasivos/EnviosMasivos');
});

// Cierra verificacion autenticacion
// Hacia arriba las rutas son obligatorias estar logueado
});

//------------------------------------------------------------
//------------------------------------------------------------
//                CONTROLADORES
//------------------------------------------------------------
//------------------------------------------------------------



//------------------------------------------------------------
//                Grupos
//------------------------------------------------------------
Route::get('creargrupo','GrupoController@creargrupo');
Route::get('actualizargrupo', 'GrupoController@actualizargrupo');
Route::get('eliminargrupo', 'GrupoController@eliminargrupo');


//------------------------------------------------------------
//                Sub  Grupos
//------------------------------------------------------------
Route::get('crearsubgrupo', 'SubGrupoController@crearsubgrupo');
Route::get('actualizarsubgrupo', 'SubGrupoController@actualizarsubgrupo');
Route::get('eliminarsubgrupo', 'SubGrupoController@eliminarsubgrupo');

//------------------------------------------------------------
//                Cadenas
//------------------------------------------------------------
Route::get('crearcadena', 'CadenaController@crearcadena');
Route::get('actualizarcadena', 'CadenaController@actualizarcadena');
Route::get('eliminarcadena', 'CadenaController@eliminarcadena');

//------------------------------------------------------------
//                Productos
//------------------------------------------------------------
Route::get('crearproducto', 'ProductoController@crearproducto');
Route::get('actualizarproducto', 'ProductoController@actualizarproducto');
Route::get('eliminarproducto', 'ProductoController@eliminarproducto');
Route::get('listarproductos', 'ProductoController@listarproductos');


//------------------------------------------------------------
//                Variedades
//------------------------------------------------------------
Route::get('crearvariedad', 'VariedadController@crearvariedad');
Route::get('actualizarvariedad', 'VariedadController@actualizarvariedad');
Route::get('eliminarvariedad', 'VariedadController@eliminarvariedad');
Route::get('ListaVariedades', 'VariedadController@listarvariedad');


//------------------------------------------------------------
//                Departamentos
//------------------------------------------------------------
Route::get('creardepartamento', 'DepartamentoController@creardepartamento');
Route::get('actualizardepartamento', 'DepartamentoController@actualizardepartamento');
Route::get('eliminardepartamento', 'DepartamentoController@eliminardepartamento');


//------------------------------------------------------------
//                Departamentos
//------------------------------------------------------------
Route::get('crearmunicipio', 'MunicipioController@crearmunicipio');
Route::get('actualizarmunicipio', 'MunicipioController@actualizarmunicipio');
Route::get('eliminarmunicipio', 'MunicipioController@eliminarmunicipio');


//------------------------------------------------------------
//                Mercado
//------------------------------------------------------------
Route::get('crearmercado', 'MercadoController@crearmercado');
Route::get('actualizarmercado', 'MercadoController@actualizarmercado');
Route::get('eliminarmercado', 'MercadoController@eliminarmercado');


//------------------------------------------------------------
//                Municipios de Influencia
//------------------------------------------------------------
Route::get('crearmunicipioinfluencia', 'MunicipioInfluenciaController@crearmunicipioinfluencia');
Route::get('actualizarmunicipioinfluencia', 'MunicipioInfluenciaController@actualizarmunicipioinfluencia');
Route::get('eliminarmunicipioinfluencia', 'MunicipioInfluenciaController@eliminarmunicipioinfluencia');

//------------------------------------------------------------
//                 Fuente
//------------------------------------------------------------
Route::get('crearfuente', 'FuenteController@crearfuente');
Route::get('actualizarfuente', 'FuenteController@actualizarfuente');
Route::get('eliminarfuente', 'FuenteController@eliminarfuente');


//------------------------------------------------------------
//                  user
//------------------------------------------------------------
Route::get('crearuser', 'UserController@crearuser');
Route::get('actualizaruser', 'UserController@actualizaruser');
Route::get('eliminaruser', 'UserController@eliminaruser');

//------------------------------------------------------------
//               Actividades
//------------------------------------------------------------
Route::get('crearactividad', 'ActividadController@crearactividad');
Route::get('actualizaractividad', 'ActividadController@actualizaractividad');
Route::get('eliminaractividad', 'ActividadController@eliminaractividad');


//------------------------------------------------------------
//               Informacion
//------------------------------------------------------------
Route::get('crearinformacion', 'InformacionController@crearinformacion');
Route::get('actualizarinformacion/{cadena_id}', 'InformacionController@actualizarinformacion');
Route::get('eliminarinformacion', 'InformacionController@eliminarinformacion');


//------------------------------------------------------------
//               Envios
//------------------------------------------------------------
Route::get('crearenvio', 'EnvioControllers@crearenvio');
Route::get('actualizarenvio/{cadena_id}', 'EnvioControllers@actualizarenvio');
Route::get('eliminarenvio', 'EnvioController@eliminarenvio');


//------------------------------------------------------------
//               Operadores
//------------------------------------------------------------
Route::get('crearoperador', 'OperadorController@crearoperador');
Route::get('actualizaroperador/{cadena_id}', 'OperadorController@actualizaroperador');
Route::get('eliminaroperador', 'EnvioController@eliminaroperador');


//------------------------------------------------------------
//               Productores
//------------------------------------------------------------
Route::get('crearproductor', 'ProductorController@crearproductor');
Route::get('actualizarproductor', 'ProductorController@actualizarproductor');
Route::get('eliminarproductor', 'ProductorController@eliminarproductor');
Route::get('buscarproductor', 'ProductorController@buscarproductor');




