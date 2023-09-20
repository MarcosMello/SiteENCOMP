<?php

use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\LocaleController;
use App\Http\Controllers\Web\LogController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('locale')->group(function () {

    //Change system language route
    Route::put('/locale', [LocaleController::class, 'setLocale'])->name('locale');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Auth::routes();

    Route::middleware('auth')->group(function () {

        //Dashboard routes
        Route::any('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //User profile routes
        Route::controller(ProfileController::class)->name('profile.')->group(function () {
            Route::get('profile', 'edit')->name('edit');
            Route::put('profile', 'update')->name('update');
            Route::put('profile/password', 'password')->name('password');
        });

        //Route::middleware('')->group(function () {
            //Log routes
            Route::any('log', [LogController::class, 'index'])->name('log.index');

            //User CRUD routes
            Route::resource('user', UserController::class, ['except' => ['show']]);
            //Client CRUD routes
            Route::resource('client', ClientController::class);
        //});
    });
});
