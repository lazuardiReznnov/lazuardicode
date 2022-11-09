<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CategoryLetters;
use App\Models\Letter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            ProfilSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            BakSeeder::class,
            GroupSeeder::class,
            FlagSeeder::class,
            TypeSeeder::class,
            UnitSeeder::class,
            CategoryletterSeeder::class,
            LetterSeeder::class,
        ]);
    }
}
