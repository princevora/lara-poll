<?php
use Illuminate\Support\Facades\Route;

Route::name('auth.')->group(function (){
    Route::view('signup', 'pages.user.auth.signup')->name('signup');
});