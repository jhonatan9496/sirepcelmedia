<?php

use Illuminate\Database\Migrations\Migration;

class CrearGrupos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grupos', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_grupo',100);
            $table->string('descripcion_grupo',300);
            
            
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('grupos');
	}

}