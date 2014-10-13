<?php

use Illuminate\Database\Migrations\Migration;

class CrearProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function($table)
        {
            $table->increments('id');
            
            $table->string('nombre_producto',100);
            //llave foranea producto-subgrupo
            $table->integer('subgrupo_id')->unsigned();
            $table->foreign('subgrupo_id')->references('id')->on('sub_grupos')->onDelete('cascade');
           
           
            
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
		Schema::drop('productos');
	}

}