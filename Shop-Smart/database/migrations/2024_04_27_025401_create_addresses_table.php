<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->unsigned();
			$table->string('country', 50);
			$table->string('state', 50);
			$table->string('city', 50)->nullable();
			$table->string('street_name', 50);
			$table->integer('building_number');
			$table->integer('floor_number');
			$table->integer('apartment_number')->nullable();
			$table->string('additional_details', 255)->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('addresses');
	}
};
