<?php

class Departamento extends Eloquent {

	
	protected $table = 'departamentos';

	public function Municipio(){
		return $this->hasMany('Municipio','departamento_id');
	}

	public function Mercado(){
		return $this->hasMany('Mercado','departamento_id');
	}

	public function MunicipioInfluencia(){
		return $this->hasMany('MunicipioInfluencia','departamento_id');
	}

	public function productor(){
		return $this->hasMany('Productor','departamento_id');
	}

}