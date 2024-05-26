<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poll - {{ request()->poll_id }}</title>

    @livewireStyles
    @votterStyles
</head>

<body>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <a href="{{ route('public.poll', ['poll_id' => request()->poll_id]) }}" wire:navigate>
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                        <div class="col-xl-8 col-md-12">
                            <div class="card card-plain">
                                <div class="card-body border-top border-5 border-info shadow-lg rounded text-center">
                                    <livewire:vote.poll />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @votterJs
    @livewireScripts
</body>
</html>
