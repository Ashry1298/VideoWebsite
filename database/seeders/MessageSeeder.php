<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++){ 
            # code...
            Message::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->email(),
                'message' => $faker->paragraph(),
                'created_at' => now(),
            ]);
        }
    }
}
