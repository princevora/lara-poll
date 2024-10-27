@extends('pages.user.layouts.auth.layout')
@section('title', 'Sign In')
@section('content')
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
                        <div class="oblique-image position-absolute d-flex fixed-top ms-auto h-100 z-index-0 bg-cover me-n8"
                            style="background-image:url('{{ asset('/assets/img/image-sign-up.jpg') }}')">
                            <div class="my-auto text-start max-width-350 ms-7">
                                <h1 class="mt-3 text-white font-weight-bolder">Sign In <br> Lara - Poll.</h1>
                                <p class="text-white text-lg mt-4 mb-4">Sign In To Dashboard to create and manage your polls</p>
                            </div>
                        </div>
                    </div>
                </div>
                <livewire:user.auth.login />
            </div>
        </div>
    </div>
@endsection
