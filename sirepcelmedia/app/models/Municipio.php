<?php

class Municipio extends Eloquent {

	
	protected $table = 'municipios';

	public function departamento(){
		return $this->belongsTo('Departamento');
	}

	public function mercado(){
		return $this->hasMany('Mercado','municipio_id');
	}

	public function Municipio(){
		return $this->hasMany('MunicipioInfluencia','municipio_id');
	}


	public function MunicipioInfluencia(){
		return $this->hasMany('MunicipioInfluencia','influencia_id');
	}

	public function productor(){
		return $this->hasMany('Productor','municipio_id');
	}

	

}