<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {


	public function up()
	{
		Schema::create('purchase_products', function(Blueprint $table) {
            $table->id();
			$table->foreignId('purchase_id')->constrained()->cascadeOnDelete()->unsigned();
			$table->foreignId('product_id')->constrained()->cascadeOnDelete()->unsigned();
			$table->integer('quantity')->unsigned()->default('1');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('purchase_products');
	}
};
