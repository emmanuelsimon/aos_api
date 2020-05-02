<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoyagesTable extends Migration {

	public function up()
	{
		Schema::create('voyages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->date('startDate');
			$table->string('title');
			$table->string('shortDescription')->nullable();
			$table->string('color')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('voyages');
	}
}