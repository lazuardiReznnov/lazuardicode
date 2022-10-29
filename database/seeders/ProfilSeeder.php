<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilUser;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfilUser::create([
            'user_id' => 1,
            'fullname' => 'Mohamad Lazuardi Noor',
            'slug' => 'mohamad-lazuardi-noor',
            'smalltitle' => 'Lahir Menangis, Mati tersenyum',
            'descriptions' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eum quod reiciendis molestiae ratione, at obcaecati voluptatibus ad ea. Expedita eligendi quae iusto rem minima asperiores porro, ratione incidunt cupiditate mollitia ea natus dicta. Praesentium impedit, mollitia delectus quae quo commodi, aut amet veniam ipsa consequatur minus dicta nemo vitae.',
            'job' => 'Web Programmer | Administration',
            'facebook' => 'https://web.facebook.com/lazuardiReznnov',
            'instagram' => 'https://www.instagram.com/imlazuardy',
            'linkedin' =>
                'https://www.linkedin.com/in/mohamad-lazuardi-noor-041aa28b/',
        ]);
    }
}
