<?php

use Illuminate\Database\Migrations\Migration;

class CrearProductores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productores', function($table)
        {
            $table->increments('id');
            
            $table->string('primer_nombre',100);
            $table->string('segundo_nombre',100);
            $table->string('primer_apellido',100);
            $table->string('segundo_apellido',100);
            $table->string('cedula',100);
            $table->string('celular',100);
            $table->string('correo',100);
            $table->string('vereda',100);
            $table->string('finca',100);
            $table->string('profesion',100);
            $table->string('tecnificacion',100);
            $table->date('fecha_inscripcion',100);
            $table->string('fuente',100);
            $table->string('codigo_productor',100);
            $table->integer('asistente_tecnico');
            $table->date('ultima_actualizacion',100);
            $table->string('eliminado',100);
			//llave foranea de productor - actividad
            $table->integer('actividad_id')->unsigned();
            $table->foreign('actividad_id')->references('id')->on('actividades')->onDelete('cascade');
           //llave foranea de productor - productores-fuente
            $table->integer('fuente_id')->unsigned();
            $table->foreign('fuente_id')->references('id')->on('fuentes')->onDelete('cascade');
           //llave foranea de productor - productores-usuario- creado
            $table->integer('crea_id')->unsigned();
            $table->foreign('crea_id')->references('id')->on('users')->onDelete('cascade');
           //llave foranea de productor - productores-usuario- actualiza
            $table->integer('actualiza_id')->unsigned();
            $table->foreign('actualiza_id')->references('id')->on('users')->onDelete('cascade');
           //llave foranea productores-municipio
            $table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            //llave foranea productores - departamento
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
           //llave foranea productores - operador
            $table->integer('operador_id')->unsigned();
            $table->foreign('operador_id')->references('id')->on('operadores')->onDelete('cascade');
           
            
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
		Schema::drop('productores');
	}

}