<?php

Route::name('user.')->group(function() {
    Route::middleware('auth.session')->group(function (){
        Route::view('dashboard', 'pages.user.dashboard.index')->name('dashboard');

        // Polls routes.
        Route::prefix('polls')->name('polls.')->group(function () {
            Route::view('/', 'pages.user.dashboard.polls.index')->name('index');
            Route::view('edit/{poll_id}', 'pages.user.dashboard.polls.edit')->name('edit');
        });
    });
});