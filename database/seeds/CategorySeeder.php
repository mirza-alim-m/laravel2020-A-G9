<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['name' => 'Buku'],
            ['name' => 'Biografi'],
            ['name' => 'Cerpen'],
            ['name' => 'Jurnal'],
            ['name' => 'Komik'],
            ['name' => 'Majalah'],
            ['name' => 'Materi'],
            ['name' => 'Novel'],
            ['name' => 'Skripsi'],
        ];

        foreach ($category as $category){
            Category::create($category);
        }
    }
}
