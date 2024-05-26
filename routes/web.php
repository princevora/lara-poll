<?php

use App\Http\Controllers\Polls\PollResultController;
use App\Models\Votes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
| Routes TO Create A Vote And Manage It.
*/

Route::prefix('onboard')->group(function(){
    Route::view('name-your-poll', 'pages.create-poll', ['page' => 'on-board.name-poll'])->name('vote.create');
    Route::view('add-fields', 'pages.create-poll', ['page' => 'on-board.add-fields'])->name('vote.add-fields');
    Route::view('confirmation/{poll_id}', 'pages.create-poll', ['page' => 'on-board.confirm-make-account'])->name('vote.confirm-account');
});

Route::prefix('poll')->group(function(){
    Route::view('data/{poll_id}', 'pages.poll')->name('public.poll');
    Route::get('{poll_id}/result', [PollResultController::class, 'index'])->name('public.poll.results');

    /**
     * Handle Ajax Post Request For Poll results.
     * ! [Important]: this method is currently Not in use..
     * Route::post('{poll_id}/result', [PollResultController::class, 'refreshPoll'])->name('ajax.poll.results');
     */
});

