<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('categories',Category::get());
        view()->share('skills',Skill::get());
        view()->share('tags',Tag::get());
        view()->share('pages',Page::get());
    }
}
