<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 100; $i++){

            DB::table('member')->insert([
                'nim' => $faker->numberBetween($min = 17090001, 17099999),
                'nama' => $faker->name,
                'jk' => $faker->randomElement($array = array('Laki-Laki','Perempuan')),
                
                'prodi' => $faker->randomElement($array = array(
                    'D3 Farmasi',
                    'D3 Akuntansi',
                    'D3 Teknik Komputer',
                    'D3 Teknik Elektronika',
                    'D3 Teknik Mesin',
                    'D3 Perhotelan',
                    'D3 Desain Komunikasi Visual',
                    'D4 Teknik Informatika',
                    'D4 Akuntansi Sektor Publik')),

                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
