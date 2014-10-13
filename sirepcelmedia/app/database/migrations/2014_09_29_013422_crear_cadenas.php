<?php

use Illuminate\Database\Migrations\Migration;

class CrearCadenas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cadenas', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_cadena',100);
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
		Schema::drop('cadenas');
	}

}