<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for ($i=0;$i<5; $i++) { 
            Video::create([
                'name' => $faker->word(),
                'meta_keywords' => $faker->name(),
                'meta_description' =>$faker->name(),
                'description'=>$faker->paragraph(),
                'youtube'=>'https://www.youtube.com/watch?v=kJajZdlVfmg',
                'image'=>$faker->image(),
                'published'=>rand(0,1),
                'user_id'=>'1',
                'category_id'=>'1',
                'created_at' =>now(),
            ]);
        }

        
    }
}
