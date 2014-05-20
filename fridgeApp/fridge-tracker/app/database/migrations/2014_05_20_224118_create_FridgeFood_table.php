<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFridgeFoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('FridgeFood', function($table){
			$table->increments('ID');
			$table->string('Name');
			$table->string('ImgURL');
			$table->date('expiry');
			$table->integer('FridgeID')->unsigned();			
			$table->foreign('FridgeID')
				  ->references('FridgeID')
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
		Schema::drop('FridgeFood');
	}

}
