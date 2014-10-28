<?php

class UserController extends BaseController{

	
	
	public function crearuser(){

		//for ($i=0; $i < 50; $i++) { 
		$user = new User;
		$user->nombres='Jhonatan';
		$user->apellidos='Acelas Arevalo';
		$user->username='jhonatan';
		$user->email='email';
		$user->password=Hash::make('admin');
		$user->cedula='cedula';
		$user->contrato='contrato';
		$user->celular='celular';
		$user->departamento='departamento';
		$user->municipio='municipio';
		$user->municipio='municipio';
		$user->save();
		//}

		return Response::json(SubGrupo::all());

	}

	public function actualizaruser(){
		$user =4;
		$user = User::find($user);
		$user->nombres='User Update ';
		$user->save();
	}

	public function eliminaruser(){
		$user=1;
		$user =  User::find($user);
		$user->delete();
	}
}