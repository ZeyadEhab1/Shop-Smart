<?php
namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;
class ProductSeeder extends Seeder {

    public function run(): void
	{
		//DB::table('products')->delete();

		// product1
		Product::create([
				'name' => 'chocolate',
				'price' => 20
			]);

		// product2
		Product::create([
				'name' => 'honey cake',
				'price' => 100
			]);

		// product3
		Product::create([
				'name' => 'big chips' ,
				'price' => 10
			]);

		// product4
		Product::create([
				'name' => 'chocolate cake',
				'price' => 150
			]);

		// product5
		Product::create([
				'name' => 'back pack',
				'price' => 400
			]);

		// product6
		Product::create([
				'name' => 'Tv',
				'price' => 10000
			]);

		// product7
		Product::create([
				'name' => 'donuts' ,
				'price' => 260
			]);

		// product8
		Product::create([
				'name' => 'Eggs',
				'price' => 150
			]);
	}
}
