<?php

class Cadena extends Eloquent {

	
	protected $table = 'cadenas';

	


	public function variedad(){
		return $this->hasMany('Variedad','cadena_id');
	}

}