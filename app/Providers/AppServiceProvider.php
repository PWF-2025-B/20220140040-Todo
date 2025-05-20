<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useTailwind();
        Gate::define('admin', function ($user) {
            return $user->is_admin == true;
        });

        Todo::preventLazyLoading();
        User::preventLazyLoading();
        Category::preventLazyLoading();
    }
}