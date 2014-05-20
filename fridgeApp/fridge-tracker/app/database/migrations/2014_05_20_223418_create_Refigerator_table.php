<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefigeratorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Refrigerator', function($table){
			$table->increments('ID');
			$table->string('Name', 255);
			$table->string('FridgeID')->unique();
			$table->string('FreezerID')->unique();
			$table->string('Token', 20);
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
		Schema::drop('Refrigerator');		
	}

}
