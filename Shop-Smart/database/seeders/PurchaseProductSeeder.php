<?php
namespace Database\Seeders;
use App\Models\PurchaseProduct;
use Illuminate\Database\Seeder;

class PurchaseProductSeeder extends Seeder {

    public function run(): void
	{
		//DB::table('Purchase_Product')->delete();

		// order1details
		PurchaseProduct::create([
				'purchase_id' => 1,
				'product_id' => 3,
				'quantity' => 1
			]);

		// order1details
		PurchaseProduct::create([
				'purchase_id' => 1,
				'product_id' => 4,
				'quantity' => 1
			]);

		// order2details
		PurchaseProduct::create([
				'purchase_id' => 2,
				'product_id' => 6,
				'quantity' => 1
			]);

		// order3details
		PurchaseProduct::create([
				'purchase_id' => 3,
				'product_id' => 8,
				'quantity' => 2
			]);

		// order4details
		PurchaseProduct::create([
				'purchase_id' => 4,
				'product_id' => 1,
				'quantity' => 2
			]);

		// order4details
		PurchaseProduct::create([
				'purchase_id' => 4,
				'product_id' => 2,
				'quantity' => 1
			]);

		// order4details
		PurchaseProduct::create([
				'purchase_id' => 4,
				'product_id' => 8,
				'quantity' => 1
			]);

		// order5details
		PurchaseProduct::create([
				'purchase_id' => 5,
				'product_id' => 5,
				'quantity' => 1
			]);

		// order5details
		PurchaseProduct::create([
				'purchase_id' => 5,
				'product_id' => 7,
				'quantity' => 1
			]);
	}
}
