<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Member;

class memberTablesSeeder extends Seeder
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
            Member::create([
                'nim' => $faker->nim,
                'nama' => $faker->nama,
                'jk' => $faker->jk,
                'prodi' => $faker->prodi
            ]);
        }
        //
    }
}
