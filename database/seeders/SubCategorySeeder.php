<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'category_id' => '1',
            'subcategory_name' => 'Android',
            'subcategory_slug' => 'android',
            'status' => SubCategory::$statusArrays[0],
        ]);
        SubCategory::create([
            'category_id' => '2',
            'subcategory_name' => 'Iphone',
            'subcategory_slug' => 'iphone',
            'status' => SubCategory::$statusArrays[0],
        ]);
        SubCategory::create([
            'category_id' => '3',
            'subcategory_name' => 'Desktop',
            'subcategory_slug' => 'desktop',
            'status' => SubCategory::$statusArrays[0],
        ]);
    }
}
