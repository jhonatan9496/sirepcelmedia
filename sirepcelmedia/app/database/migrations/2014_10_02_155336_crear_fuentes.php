<?php

use Illuminate\Database\Migrations\Migration;

class CrearFuentes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('fuentes', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_fuente',100);
            
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
		Schema::drop('fuentes');
		
	}

}