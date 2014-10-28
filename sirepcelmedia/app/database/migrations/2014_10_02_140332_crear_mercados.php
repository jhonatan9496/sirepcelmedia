<?php

use Illuminate\Database\Migrations\Migration;

class CrearMercados extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mercados', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_mercado',100);
            //llave foranea de grupo

             //llave foranea mercados-departamento
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
           
            //llave foranea mercados-municipio
            $table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
           
            
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
		Schema::drop('mercados');
	}

}