<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import các model cần sử dụng


class TenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
