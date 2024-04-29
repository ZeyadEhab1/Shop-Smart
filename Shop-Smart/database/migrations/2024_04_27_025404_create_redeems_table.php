<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('redeems', function(Blueprint $table) {
            $table->id();
			$table->foreignId('loyalty_wallet_transaction_id')->constrained()->cascadeOnDelete()->unsigned();
			$table->foreignId('reward_id')->constrained()->cascadeOnDelete()->unsigned();
			$table->foreignId('user_id')->constrained()->cascadeOnDelete()->unsigned();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('redeems');
	}
};
