<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Middleware\GymMiddleware;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('base', [App\Http\Controllers\BasicController::class, 'index']);

Route::post('base',[App\Http\Controllers\BasicController::class, 'Post']);

Route::get('base/search',[App\Http\Controllers\BasicController::class, 'Search']);

Route::post('base/search',[App\Http\Controllers\BasicController::class, 'Select_Chat_Gym']);

Route::get('base/profile',[App\Http\Controllers\BasicController::class, 'Profile']);