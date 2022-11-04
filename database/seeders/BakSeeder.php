<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bak;

class BakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bak::Create([
            'name' => 'Flat Dek',
            'slug' => 'flat-dek',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit porro perferendis consectetur voluptatibus fuga reiciendis alias laborum, iste illo expedita.',
        ]);
    }
}
