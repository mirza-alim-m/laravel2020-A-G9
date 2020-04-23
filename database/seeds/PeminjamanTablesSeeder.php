<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Peminjaman;

class PeminjamanTablesSeeder extends Seeder
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
            Peminjaman::create([
                'buku_id' => $faker->buku_id,
                'nim' => $faker->nim,
                'nama' => $faker->nama,
                'prodi' => $faker->prodi,
                'tanggal' => $faker->dateTimeThisCentury()->format('Y-m-d')
            ]);
        }
        //
    }
}
