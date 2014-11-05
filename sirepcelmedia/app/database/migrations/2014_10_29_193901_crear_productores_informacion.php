<?php

use Illuminate\Database\Migrations\Migration;

class CrearProductoresInformacion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productores_informacion', function($table)
        {
            $table->increments('id');
            
            $table->integer('eliminado');
            //llave foranea de grupo

             //llave foranea influencia - departamento
            $table->integer('productor_id')->unsigned();
            $table->foreign('productor_id')->references('id')->on('productores')->onDelete('cascade');
           
            //llave foranea influencia-municipio
            $table->integer('informacion_id')->unsigned();
            $table->foreign('informacion_id')->references('id')->on('informacion')->onDelete('cascade');
           
           
            
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
		//
	}

}