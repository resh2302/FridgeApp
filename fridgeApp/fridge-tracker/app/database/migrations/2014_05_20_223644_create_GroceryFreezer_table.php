<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroceryFreezerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('GroceryFreezer', function($table){
			$table->increments('ID');
			$table->string('ItemName');
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
		Schema::drop('GroceryFreezer');		
		
	}

}
