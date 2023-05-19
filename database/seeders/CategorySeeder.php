<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for ($i=0; $i < 5; $i++) { 
            # code...
            Category::create([
                'name' => $faker->word(),
                'meta_keywords' => $faker->name(),
                'meta_description' =>$faker->name(),
                'created_at' =>now(),
    
            ]);
        }
    }
}
