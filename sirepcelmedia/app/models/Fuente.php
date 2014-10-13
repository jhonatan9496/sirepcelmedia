<?php

class Fuente extends Eloquent {

	
	protected $table = 'fuentes';


	public function productor(){
		return $this->hasMany('Productor','fuente_id');
	}


}