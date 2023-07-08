<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $courseCount = Course::count();
            $view->with('courseCount', $courseCount);
        });
        View::composer('*', function ($view) {
            $category = Category::all();
            $view->with('category', $category);
        });
    }
}
