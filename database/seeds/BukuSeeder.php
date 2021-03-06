<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 100; $i++) {

            DB::table('buku')->insert([
                'category_id' => $faker->numberBetween(1, 9),
                'judul' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'penerbit' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'penulis' => $faker->name,
                'jumlah' => $faker->numberBetween(1, 10),
                'foto' => '/buku/foto.png',
                'pdf' => '/document/buku/document.pdf',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
