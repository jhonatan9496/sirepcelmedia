<?php

use Illuminate\Database\Migrations\Migration;

class CrearEnvios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('envios', function($table)
        {
            $table->increments('id');
            
            $table->date('fecha_inicio',100);
            $table->date('fecha_fin',100);
            $table->string('tipo',100);
            $table->string('asunto',100);
            $table->string('mensaje',500);
            $table->string('estado',100);
            $table->integer('impactados');
            $table->integer('enviados');
            $table->integer('no_enviados');	
            
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