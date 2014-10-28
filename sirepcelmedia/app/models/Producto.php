<?php

class Producto extends Eloquent {

	
	protected $table = 'productos';

	
	public function subgrupo(){
		return $this->belongsTo('SubGrupo');
	}

	
	

	public function variedad(){
		return $this->hasMany('Variedad','producto_id');
	}

}