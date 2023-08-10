<?php

namespace Database\Seeders;
use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'category_name' => 'Mobile',
            'category_slug' => 'mobile',
            'status' => Categories::$statusArrays[0],
        ]);
        Categories::create([
            'category_name' => 'Apple',
            'category_slug' => 'apple',
            'status' => Categories::$statusArrays[0],
        ]);
        Categories::create([
            'category_name' => 'Windows',
            'category_slug' => 'windows',
            'status' => Categories::$statusArrays[0],
        ]);
    }
}
