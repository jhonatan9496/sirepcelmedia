<?php

class Informacion extends Eloquent{

	protected $table = 'informacion';
	

	public function productor(){
		return $this->hasMany('Productor','informacion_id');
	}

	
}