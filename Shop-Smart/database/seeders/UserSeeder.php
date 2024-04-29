<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // user1
        User::create([
            'name' => 'zeyad',
            'password' => 'pass@1234',
            'phone' => '01145980208',
            'email' => 'zeyad@gmail.com'
        ]);

        // user2
        User::create([
            'name' => 'mohamed',
            'password' => 'pass@1234',
            'phone' => '01145980209',
            'email' => 'mohamed@gmail.com'
        ]);

        // user3
        User::create([
            'name' => 'amir',
            'password' => 'pass@1234',
            'phone' => '01145980207',
            'email' => 'amir@gmail.com'
        ]);

        // user4
        User::create([
            'name' => 'hamed',
            'password' => 'pass@1234',
            'phone' => '01145980203',
            'email' => 'hamed@gmail.com'
        ]);
    }
}



