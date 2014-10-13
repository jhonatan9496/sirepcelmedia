<?php

class Productor extends Eloquent {

	
	protected $table = 'productores';

	
	public function actividad(){
		return $this->belongsTo('Actividad');
	}

	public function fuente(){
		return $this->belongsTo('Fuente');
	}

	public function crea(){
		return $this->belongsTo('User');
	}

	public function actualiza(){
		return $this->belongsTo('User');
	}

	public function municipio(){
		return $this->belongsTo('Municipio');
	}

	public function departamento(){
		return $this->belongsTo('Departamento');
	}
	
	public function operador(){
		return $this->belongsTo('Operador');
	}
	

	public function productorvariedad(){
		return $this->hasMany('ProductorVariedad','producto_id');
	}

	public function mensaje(){
		return $this->hasMany('Mensaje','producto_id');
	}

	public function productorinformacion(){
		return $this->hasMany('ProductorInformacion','producto_id');
	}
}