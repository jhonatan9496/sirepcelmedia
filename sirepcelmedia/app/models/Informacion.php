<?php

class Informacion extends Eloquent{

	protected $table = 'informacion';
	

	public function informacion(){
		return $this->hasMany('ProductorInformacion','informacion_id');
	}

	
}