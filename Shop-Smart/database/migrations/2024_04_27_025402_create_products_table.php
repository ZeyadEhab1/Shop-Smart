<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->id();
            $table->string('name', 50);
			$table->string('photo', 255)->nullable();
			$table->string('description', 255)->nullable();
			$table->decimal('price', 8,2);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('products');
	}
};
