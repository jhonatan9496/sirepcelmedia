<?php

class SubGrupo extends Eloquent{

	
	public function grupo(){
		return $this->belongsTo('Grupo');
	}

	public function producto(){
		return $this->hasMany('Producto','subgrupo_id');
	}

	public function variedad(){
		return $this->hasMany('Variedad','cadena_id');
	}
	
}