<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresa_videos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('empresa_id');
			$table->integer('video_id');
			$table->foreign('empresa_id')
      ->references('id')->on('empresas');
      		$table->foreign('video_id')
      ->references('id')->on('videos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresa_videos');
	}

}
