<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {

	public function run(): void
	{
        $this->call(UserSeeder::class);
        $this->call(AddresseSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PurchaseSeeder::class);
        $this->call(PurchaseProductSeeder::class);

	}
}
