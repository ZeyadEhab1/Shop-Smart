<?php
namespace Database\Seeders;
use App\Models\Address;
use Illuminate\Database\Seeder;

class AddresseSeeder extends Seeder {

    public function run(): void
	{
		//DB::table('addresses')->delete();

		// address_user1
		Address::create([
				'user_id' => 1,
				'country' => 'Egypt',
				'state' => 'Cairo',
				'city' => 'Maadi',
				'street_name' => 'street9',
				'building_number' => 62,
				'floor_number' => 4,
				'apartment_number' => 3
			]);

		// address_user2
		Address::create([
				'user_id' => 2,
				'country' => 'Egypt',
				'state' => 'Cairo',
				'city' => '5th settlement' ,
				'street_name' => 'Gamal Ebd-Elnasser',
				'building_number' => 78,
				'floor_number' => 4,
				'apartment_number' => 2
			]);

		// address_user2
		Address::create([
				'user_id' => 2,
				'country' => 'Egypt',
				'state' => 'Cairo',
				'city' => 'Maadi',
				'street_name' => 'Degla El-Maadi'  ,
				'building_number' => 33,
				'floor_number' => 2,
				'apartment_number' => 1
			]);

		// address_user3
		Address::create([
				'user_id' => 3,
				'country' => 'Egypt',
				'state' => 'El-dakhlia',
				'city' => 'Mansoura',
				'street_name' => 'El-gamaa Street',
				'building_number' => 25,
				'floor_number' => 4,
				'apartment_number' => 1
			]);

		// address_user4
		Address::create([
				'user_id' => 4,
				'country' => 'Egypt',
				'state' => 'Alexandria' ,
				'city' => '6-May',
				'street_name' => 'El-gesh',
				'building_number' => 66,
				'floor_number' => 12,
				'apartment_number' => 3
			]);
	}
}
