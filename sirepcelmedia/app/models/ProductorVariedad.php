<?php

class ProductorVariedad extends Eloquent{

	protected $table = 'productores_variedades';
	

	public function produc(){
		return $this->belongsTo('Productor','productores_id');
	}

	public function variedad(){
		return $this->belongsTo('Variedad');
	}

	
}