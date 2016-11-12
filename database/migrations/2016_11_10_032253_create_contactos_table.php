<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contactos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('telefono1')->nullable();
			$table->string('telefono2')->nullable();
			$table->string('correo')->nullable();
			$table->string('direccion')->nullable();
			$table->string('ubicacion_google')->nullable();
			$table->string('pagina_web')->nullable();
			$table->integer('municipio_id');
			$table->foreign('municipio_id')
      ->references('id')->on('municipios');


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contactos');
	}

}
