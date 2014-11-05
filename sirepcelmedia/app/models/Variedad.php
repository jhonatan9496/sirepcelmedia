<?php

class Variedad extends Eloquent {

	
	protected $table = 'variedades';



	
	public function subgrupo(){
		return $this->belongsTo('SubGrupo');
	}

	public function cadena(){
		return $this->belongsTo('Cadena');
	}

	public function producto(){
		return $this->belongsTo('Producto');
	}

	public function grupo(){
		return $this->belongsTo('Grupo');
	}

	public function variedad(){
		return $this->hasMany('ProductorVariedad','variedad_id');
	}
	
/*
	public function variedad(){
		return $this->hasMany('Variedad','producto_id');
	}
*/
}