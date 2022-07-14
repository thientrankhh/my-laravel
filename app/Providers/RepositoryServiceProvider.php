<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryEloquent;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->bind(PostRepository::class, PostRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
