<?php

use Illuminate\Database\Migrations\Migration;

class CrearInformacion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informacion', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_informacion',100);
            
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
		Schema::drop('informacion');
	}

}