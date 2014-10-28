<?php

class Mercado extends Eloquent {

	
	protected $table = 'mercados';

	public function departamento(){
		return $this->belongsTo('Departamento');
	}

	public function municipio(){
		return $this->belongsTo('Municipio');
	}
	

	

}