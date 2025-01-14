<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\AuthController;

Route::get('/', function() {
    return view("welcome");
});

Route::get('/auth/redirect/vk', [AuthController::class, 'redirectToVK'])->name('vk.redirect');
Route::get('/auth/callback/vk', [AuthController::class, 'handleVKCallback'])->name('vk.callback');

// Маршрут для профиля
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
