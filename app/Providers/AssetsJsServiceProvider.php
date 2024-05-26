<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AssetsJsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('votterJs', function(): string{
            return <<<HTML
                <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
                <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
                <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
                <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
                <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
                <script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}" type="text/javascript"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
                    window.addEventListener('msg', event => {
                        let msg = event.detail[0];
                        Swal.fire({
                            icon: msg.msgType,
                            html: msg.msg,
                        });
                    })

                    $(function () {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>
            HTML;
        });
    }
}
