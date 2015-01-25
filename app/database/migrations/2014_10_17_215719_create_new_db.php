<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewDb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// elimina la bd original y crear todas las tablas de la nueva db
		Schema::dropIfExists('pairs');

		Schema::create('pairs', function($table)
		{
			$table->increments('id');
			$table->string('nombres', 45);
			$table->string('apellidos', 45);
			//$table->bigInteger('telefono')->nullable();
			$table->string('correo', 100);
			//$table->string('profesion', 45)->nullable();
			$table->string('formacion', 45);
			$table->string('area_formacion', 45)->nullable();
			$table->string('area_especifica', 45)->nullable();
			$table->string('otras_areas', 45)->nullable();
			$table->string('entidad', 45);
			$table->smallInteger('ultima_publicacion');
			//$table->smallInteger('fecha_pub2');
			$table->timestamps();
		});

		Schema::create('articles', function($table){
			$table->increments('id');
			$table->string('titulo', 200);
			$table->timestamps();
		});

		Schema::create('article_pair', function($table){
			$table->increments('id');
			$table->integer('article_id');
			$table->integer('pair_id');
			$table->date('fecha_evaluacion');
			//$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// eliminar la bd anterior y crear la original
		Schema::drop('pairs_articles');
		Schema::drop('articles');
		Schema::drop('pairs');
	}

}
