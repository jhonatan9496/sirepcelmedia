<?php

use Illuminate\Database\Migrations\Migration;

class CrearOperadores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operadores', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_operador',100);
            
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
		Schema::drop('operadores');
		
	}

}