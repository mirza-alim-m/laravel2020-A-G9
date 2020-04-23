<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Buku;

class BukuTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {

            // insert data ke table pegawai menggunakan Faker
            Buku::create([
                'judul' => $faker->judul,
                'category_id' => $faker->category_id,
                'penerbit' => $faker->penerbit,
                'penulis' => $faker->pebulis,
                'jumlah' => $faker->jumlah,
                'created_at' => $faker->created_at,
                'updated_at'  => $faker->updated_at
            ]);
        }
        //
    }
}
