@extends('pages.user.layouts.auth.layout')
@section('content')
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
                        <div class="oblique-image position-absolute d-flex fixed-top ms-auto h-100 z-index-0 bg-cover me-n8"
                            style="background-image:url('../assets/img/image-sign-up.jpg')">
                            <div class="my-auto text-start max-width-350 ms-7">
                                <h1 class="mt-3 text-white font-weight-bolder">Sign Up <br> Lara - Poll.</h1>
                                <p class="text-white text-lg mt-4 mb-4">Sign up to create and manage your polls</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-black text-dark display-6">Sign up</h3>
                        </div>
                        <div class="card-body">
                            <livewire:user.auth.signup />
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-xs mx-auto">
                                Already have an account?
                                <a href="javascript:;" class="text-dark font-weight-bold">Sign in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
