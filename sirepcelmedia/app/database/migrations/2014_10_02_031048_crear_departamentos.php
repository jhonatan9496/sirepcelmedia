<?php

use Illuminate\Database\Migrations\Migration;

class CrearDepartamentos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departamentos', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_departamento',100);
            //llave foranea de grupo
            
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
		Schema::drop('departamentos');
		
	}

}