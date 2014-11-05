<?php

use Illuminate\Database\Migrations\Migration;

class CrearProductoresVariedades extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productores_variedades', function($table)
        {
            $table->increments('id');
            
            $table->integer('eliminado');
            //llave foranea de grupo

             //llave foranea influencia - departamento
            $table->integer('productores_id')->unsigned();
            $table->foreign('productores_id')->references('id')->on('productores')->onDelete('cascade');
           
            //llave foranea influencia-municipio
            $table->integer('variedad_id')->unsigned();
            $table->foreign('variedad_id')->references('id')->on('variedades')->onDelete('cascade');
           
           
            
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