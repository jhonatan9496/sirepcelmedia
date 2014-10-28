<?php

class Operador extends Eloquent{

	protected $table = 'operadores';
	

	public function productor(){
		return $this->hasMany('Productor','operador_id');
	}

	
}