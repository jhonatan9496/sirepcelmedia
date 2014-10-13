<?php

class MunicipioInfluencia extends Eloquent {

	
	protected $table = 'municipios_influencia';


	public function departamento(){
		return $this->belongsTo('Departamento');
	}

	public function municipio(){
		return $this->belongsTo('Municipio');
	}

	public function influencia(){
		return $this->belongsTo('Municipio');
	}
	

	

}