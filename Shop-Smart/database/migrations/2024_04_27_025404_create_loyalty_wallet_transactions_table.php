<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('loyalty_wallet_transactions', function(Blueprint $table) {
			$table->id();
			$table->foreignId('loyalty_wallet_id')->constrained()->cascadeOnDelete()->unsigned();
			$table->decimal('balance_before', 8,2);
			$table->decimal('amount', 8,2);
			$table->enum('type', array('up', 'down'));
			$table->decimal('balance_after', 8,2);
            $table->foreignId('reward_id')->nullable()->constrained()->cascadeOnDelete()->unsigned();
            $table->string('description', 255)->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('loyalty_wallet_transactions');
	}
};
