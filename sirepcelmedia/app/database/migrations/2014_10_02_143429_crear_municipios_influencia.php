<?php

use Illuminate\Database\Migrations\Migration;

class CrearMunicipiosInfluencia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipios_influencia', function($table)
        {
            $table->increments('id');
            
            $table->integer('prioridad');
            //llave foranea de grupo

             //llave foranea influencia - departamento
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
           
            //llave foranea influencia-municipio
            $table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
           
           //llave foranea influencia-municipio_influencia
            $table->integer('influencia_id')->unsigned();
            $table->foreign('influencia_id')->references('id')->on('municipios')->onDelete('cascade');
           
            
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
		Schema::drop('municipios_influencia');
	}

}