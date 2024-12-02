<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        
       Paginator::useBootstrap();
       // Hoặc auth()->user();

       View::composer('layout.layout', function ($view) {
        $view->with('categories', DB::table('categories')->get());
       
    });
    }
}
