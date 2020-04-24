<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('BukuSeeder'::class);
        $this->call('MemberSeeder'::class);
        $this->call('PeminjamanSeeder'::class);
        $this->call('CategorySeeder'::class);
        $this->call('UsersSeeder'::class);
    }
}
