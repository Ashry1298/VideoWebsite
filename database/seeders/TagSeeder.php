<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for ($i=0; $i <5 ; $i++) { 
            Tag::create([
                'name' => $faker->word(),
                'created_at' =>now(),
            ]);
        }
       
    }
}
