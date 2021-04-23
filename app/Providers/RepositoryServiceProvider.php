<?php


namespace App\Providers;


use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\EloquentCategory;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\EloquentComment;
use App\Repositories\Post\EloquentPost;
use App\Repositories\Post\PostRepository;
use App\Repositories\Rate\EloquentRate;
use App\Repositories\Rate\RateRepository;
use App\Repositories\User\EloquentUser;
use App\Repositories\User\UserRepository;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategoryRepository::class, EloquentCategory::class);
        $this->app->bind(CommentRepository::class, EloquentComment::class);
        $this->app->bind(PostRepository::class, EloquentPost::class);
        $this->app->bind(RateRepository::class, EloquentRate::class);
        $this->app->bind(UserRepository::class, EloquentUser::class);
    }
}
