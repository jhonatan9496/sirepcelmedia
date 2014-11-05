<?php

class ProductorInformacion extends Eloquent{

	protected $table = 'productores_informacion';
	

	public function productor(){
		return $this->belongsTo('Productor');
	}

	public function informacion(){
		return $this->belongsTo('Informacion');
	}

	
}