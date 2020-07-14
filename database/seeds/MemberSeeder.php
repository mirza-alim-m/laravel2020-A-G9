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
        DB::table('member')->insert([
            'id' => '1',
            'nim' => '17090142',
            'nama' => 'Andika Panji Perkasa',
            'jk' => 'Laki-Laki',            
            'prodi' => 'D4 Teknik Informatika',
            'foto'=> '/member/andika.png',
            'pdf'=> '/document/member/biodata.pdf',

            'created_at' => now(),
            'updated_at' => now()
        ]);

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
                
                'foto'=> '/member/foto.png',
                'pdf'=> '/document/member/document.pdf',

                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
