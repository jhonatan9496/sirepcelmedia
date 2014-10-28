<?php

use Illuminate\Database\Migrations\Migration;

class CrearSubgrupos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_grupos', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_sub_grupo',100);
            $table->string('descripcion_sub_grupo',300);
            //llave foranea de grupo
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
           
            
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
		Schema::drop('sub_grupos');
	}

}