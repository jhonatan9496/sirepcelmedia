<?php

class Actividad extends Eloquent{

	protected $table = 'actividades';
	

	public function productor(){
		return $this->hasMany('Productor','actividad_id');
	}

	
}