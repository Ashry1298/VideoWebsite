<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Page;
use App\Models\User;
use App\Models\Skill;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Factories\CategoryFactory;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        
       $this->call([
        UserSeeder::class,
        CategorySeeder::class,
        PageSeeder::class,
        SkillSeeder::class,
        TagSeeder::class,
        VideoSeeder::class,
        CommentSeeder::class,
        MessageSeeder::class,
       ]);
    }
}
