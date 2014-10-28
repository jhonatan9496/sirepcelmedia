<?php

use Illuminate\Database\Migrations\Migration;

class CrearVariedadesMod extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('variedades', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_variedad',100);
            $table->string('codigo_dane',20);
            //llave foranea variedad-producto
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');

           //llave foranea variedad-grupo
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
           
           //llave foranea variedad-subgrupo
            $table->integer('subgrupo_id')->unsigned();
            $table->foreign('subgrupo_id')->references('id')->on('sub_grupos')->onDelete('cascade');
           
           //llave foranea variedad-cadena
            $table->integer('cadena_id')->unsigned();
            $table->foreign('cadena_id')->references('id')->on('cadenas')->onDelete('cascade');
           

            
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
		Schema::drop('variedades');
	}

}