<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CssAssetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Blade::directive("votterStyles", function(): string{
            return <<<HTML
                <!-- Fonts and icons -->
                    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
                <!-- Nucleo Icons -->
                    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
                    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
                <!-- Font Awesome Icons -->
                    <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
                    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
                <!-- CSS Files -->
                    <link id="pagestyle" href="{{ asset('assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
                <!-- Material ICons -->
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            HTML;
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
