<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {


	public function up()
	{
		Schema::create('rewards', function(Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->boolean('is_available');
			$table->string('description', 255)->nullable();
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete()->unsigned();
            $table->unsignedInteger('points');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('rewards');
	}
};
