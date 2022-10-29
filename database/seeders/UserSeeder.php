<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'lazuardi.reznnov',
            'email' => 'lazuardi.reznnov@gmail.com',
            'password' =>
                '$2y$10$9.pHKDnoSolxJJ2l28fOA.uIF1hPg5/lPkLxE92j0caCUuBI4KZYG',
            'isAdmin' => 1,
        ]);
    }
}
