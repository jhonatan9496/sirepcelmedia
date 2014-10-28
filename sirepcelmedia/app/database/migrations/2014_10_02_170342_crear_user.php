<?php

use Illuminate\Database\Migrations\Migration;

class CrearUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('users',function($table){
            $table->increments('id');
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('username',100)->unique();
            $table->string('email',100)->unique();
            $table->string('password');
            $table->integer('cedula');
            $table->integer('contrato');
            $table->string('celular');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('remember_token',100);
            $table->timestamps();
           // $table->rememberToken();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}