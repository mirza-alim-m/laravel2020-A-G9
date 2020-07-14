<?php

use Illuminate\Database\Seeder;

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
<<<<<<< HEAD
                'jumlah' => $faker->numberBetween(1,10),
                'foto'=> '/buku/foto.png',
                'pdf'=> '/document/buku/document.pdf',
=======
                'jumlah' => $faker->numberBetween(1, 10),
                'foto' => 'foto',
                'pdf' => 'pdf',
>>>>>>> 1c9364c050d1e0ffaae44dd30c34cb304603c07c
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
