<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UserDataProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            if(auth()->check()){
                // Get User Data 
                $user = auth()->user();
    
                // Return Data To All Views.
                $view->with(compact('user'));
            }
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
