<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryarray = [
            'Food',
            'Cleaning Supplies',
            'Personal Care',
            'Health',
            'Home & Kitchen',
            'Stationary',
        ];

        foreach($categoryarray as $category)
        {
            Category::updateOrCreate([
                'catgeory_name'=>$category,
            ]);
        }

    }
}
