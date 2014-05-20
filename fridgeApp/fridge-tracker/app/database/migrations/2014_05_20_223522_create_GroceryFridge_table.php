<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroceryFridgeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('GroceryFridge', function($table){
			$table->increments('ID');
			$table->string('ItemName');
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
		Schema::drop('GroceryFridge');	
		
	}

}
