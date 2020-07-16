<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PeminjamanSeeder extends Seeder
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

            DB::table('peminjamen')->insert([
                'buku_id' => $faker->numberBetween(1, 100),
                'nim' => $faker->numberBetween($min = 17090001, 17099999),
                'nama' => $faker->name,
                'prodi' => $faker->randomElement($array = array(
                    'D3 Farmasi',
                    'D3 Akuntansi',
                    'D3 Teknik Komputer',
                    'D3 Teknik Elektronika',
                    'D3 Teknik Mesin',
                    'D3 Perhotelan',
                    'D3 Desain Komunikasi Visual',
                    'D4 Teknik Informatika',
                    'D4 Akuntansi Sektor Publik'
                )),
                'tanggal' => now(),
                'foto' => '/peminjaman/foto.png',
                'pdf' => '/document/peminjaman/document.pdf',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
