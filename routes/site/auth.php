<?php
use Illuminate\Support\Facades\Route;

Route::name('auth.')->group(function (){
    Route::middleware('guest')->group(function (){
        Route::view('signup/{poll_id?}', 'pages.user.auth.signup')->name('signup');
        Route::view('login', 'pages.user.auth.signin')->name('login');
    });
});