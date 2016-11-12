<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoImagensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('producto_imagens', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('producto_id');
			$table->integer('imagen_id');
			$table->foreign('producto_id')
      ->references('id')->on('productos');
      		$table->foreign('imagen_id')
      ->references('id')->on('imagens');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('producto_imagens');
	}

}
