<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Rate;
use App\Observers\PostObserver;
use App\Observers\RateObserver;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\EloquentCategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        Rate::observe(RateObserver::class);
    }
}
