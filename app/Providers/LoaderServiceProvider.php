<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LoaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Blade::directive('loading', function($target = null){
            
        //     $target = '';

        //     if($target !== null){
        //         $target = 'wire:target = "{$target}()"';
        //     }
            
        //     return <<<HTML
        //         <div 
        //             wire:loading 
        //             {$target}
        //             class="spinner-border text-primary spinner-border-sm"
        //             role="status"
        //             >
        //             <span class="visually-hidden">Loading...</span>
        //         </div>
        //     HTML;
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
