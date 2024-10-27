<?php

Route::name('user.')->group(function() {
    Route::middleware('auth.session')->group(function (){
        Route::view('dashboard', 'pages.user.dashboard.index')->name('dashboard');
    });
});