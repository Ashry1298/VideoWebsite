<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for ($i=0; $i < 3; $i++) { 
            # code...
            Page::create([
                'name' => $faker->word(),
                'meta_keywords' => $faker->name(),
                'meta_description' =>$faker->name(),
                'description'=>$faker->paragraph(),
                'created_at' =>now(),
    
            ]);
        }
    }
}
