<?php

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

// Login Routes...
Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'App\Http\Controllers\Auth\LoginController@login');
Auth::routes([
    'register' => false,
    'login' => false,
]);

Route::group(['middleware' => 'auth'], function () {

    Route::match(array('GET', 'POST'), '/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/map', [App\Http\Controllers\HomeController::class, 'map'])->name('map');
    Route::get('/manage-users', [App\Http\Controllers\HomeController::class, 'manageUsers'])->name('manage-users');
});

