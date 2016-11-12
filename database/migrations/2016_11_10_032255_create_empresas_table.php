<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre');
			$table->string('descripcion');
			$table->string('imagen_principal')->nullable();
			$table->integer('contacto_id');
			$table->integer('categoria_id');
			$table->boolean('activa');
			$table->foreign('contacto_id')
      ->references('id')->on('contactos');
      		$table->foreign('categoria_id')
      ->references('id')->on('categorias');			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresas');
	}

}
