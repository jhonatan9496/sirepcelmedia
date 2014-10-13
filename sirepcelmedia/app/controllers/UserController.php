<?php

class UserController extends BaseController{
	
	public function crearuser(){

		for ($i=0; $i < 500; $i++) { 
		$user = new User;
		$user->nombres='nombre usuarios';
		$user->apellidos='apellidos';
		$user->username='username'.$i;
		$user->email='email'.$i;
		$user->password='password';
		$user->cedula='cedula';
		$user->contrato='contrato';
		$user->celular='celular';
		$user->departamento='departamento';
		$user->municipio='municipio';
		$user->municipio='municipio';
		$user->save();
		}

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