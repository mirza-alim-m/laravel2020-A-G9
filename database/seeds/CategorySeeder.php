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
            ['name' => 'Buku', 'foto' => '/category/foto.png', 'pdf' => '/document/category/document.pdf'],
            ['name' => 'Biografi', 'foto' => '/category/foto.png', 'pdf' => '/document/category/document.pdf'],
            ['name' => 'Cerpen', 'foto' => '/category/foto.png', 'pdf' => '/document/category/document.pdf'],
            ['name' => 'Jurnal', 'foto' => '/category/foto.png', 'pdf' => '/document/category/document.pdf'],
            ['name' => 'Komik', 'foto' => '/category/foto.png', 'pdf' => '/document/category/document.pdf'],
            ['name' => 'Majalah', 'foto' => '/category/foto.png', 'pdf' => '/document/category/document.pdf'],
            ['name' => 'Materi', 'foto' => '/category/foto.png', 'pdf' => '/document/category/document.pdf'],
            ['name' => 'Novel', 'foto' => '/category/foto.png', 'pdf' => '/document/category/document.pdf'],
            ['name' => 'Skripsi', 'foto' => '/category/foto.png', 'pdf' => '/document/category/document.pdf'],
        ];
        
        foreach ($category as $category){
            Category::create($category);
        }
    }
}
