<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up()
	{
		Schema::create('purchases', function(Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained()->unsigned();
			$table->foreignId('address_id')->constrained()->unsigned();
			$table->decimal('total_price', 8,2);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('purchases');
	}
};
