<?php

class Grupo extends Eloquent {

	
	protected $table = 'grupos';


	public function subgrupo(){
		return $this->hasMany('SubGrupo','grupo_id');
	}

	public function variedad(){
		return $this->hasMany('Variedad','cadena_id');
	}

}