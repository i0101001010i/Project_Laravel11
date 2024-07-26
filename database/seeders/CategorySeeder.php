<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "category_name" => "Category 1",
        ]);
        Category::create([
            "category_name" => "Category 2",
        ]);
        Category::create([
            "category_name" => "Category 3",
        ]);
        Category::create([
            "category_name" => "Category 4",
        ]);
    }
}
