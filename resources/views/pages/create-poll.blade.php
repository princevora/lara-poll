<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Onboarding - Create Vote</title>
    @livewireStyles
    @votterStyles
</head>
<body>
    <div class="container-fluid">
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            @if(!request()->routeIs('vote.create'))
                                <a href="{{URL::previous()}}" wire:navigate>
                                    <i class="fa-solid fa-arrow-left"></i>
                                </a>
                            @endif
                            <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
                                <div class="card card-plain mt-8">
                                    <div class="card-body">
                                        @livewire($page)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>        
    </div>
    @votterJs
    @livewireScripts
</body>
</html>