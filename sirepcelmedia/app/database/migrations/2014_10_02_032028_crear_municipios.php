<?php

use Illuminate\Database\Migrations\Migration;

class CrearMunicipios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('municipios', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_municipio',100);
            //llave foranea de grupo

            //llave foranea municipio-departamento
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
           
            
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
		Schema::drop('municipios');
	}

}