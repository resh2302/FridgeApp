<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreezerFoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('FreezerFood', function($table){
			$table->increments('ID');
			$table->string('Name');
			$table->string('ImgURL');
			$table->date('expiry');
			$table->integer('FreezerID')->unsigned();			
			$table->foreign('FreezerID')
				  ->references('FreezerID')
				  ->on('Refrigerator')
      			  ->onDelete('cascade');
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
		Schema::drop('FreezerFood');
	}

}
