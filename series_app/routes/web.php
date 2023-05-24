<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticator;
use Illuminate\Support\Facades\Route;

// authentication
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

// register
Route::get('/register', [UserController::class, 'create'])
    ->name('user.create');

Route::post('/register', [UserController::class, 'store'])
    ->name('user.store');


Route::get('/', function () {
    return redirect('/series');
})->middleware(Authenticator::class);


Route::resource('/series', SeriesController::class)
    ->middleware(Authenticator::class);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

Route::get('/seasons/{seasons}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::post('/seasons/{seasons}/episodes', [EpisodesController::class, 'update'])
    ->name('episodes.update');
