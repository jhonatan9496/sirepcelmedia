<?php

use Illuminate\Database\Migrations\Migration;

class CrearActividades extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actividades', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_actividad',100);
            
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
		Schema::drop('actividades');
	}

}