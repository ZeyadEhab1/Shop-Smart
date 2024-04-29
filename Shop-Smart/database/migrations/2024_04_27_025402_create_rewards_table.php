<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {


	public function up()
	{
		Schema::create('rewards', function(Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete()->unsigned();
            $table->string('name', 50);
			$table->string('description', 255)->nullable();
			$table->integer('points');
            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('rewards');
	}
};
