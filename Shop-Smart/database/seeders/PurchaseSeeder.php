<?php
namespace Database\Seeders;
use App\Models\Purchase;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder {

    public function run(): void
	{
		//DB::table('Purchases')->delete();

		// order1
		Purchase::create([
				'user_id' => 1,
				'address_id' => 1,
				'total_price' => 160
			]);

		// order2
		Purchase::create([
				'user_id' => 2,
				'address_id' => 2,
				'total_price' => 10000
			]);

		// order3
		Purchase::create([
				'user_id' => 3,
				'address_id' => 4,
				'total_price' => 300
			]);

		// order4
		Purchase::create([
				'user_id' => 3,
				'address_id' => 4,
				'total_price' => 290
			]);

		// order5
		Purchase::create([
				'user_id' => 4,
				'address_id' => 5,
				'total_price' => 660
			]);
	}
}
