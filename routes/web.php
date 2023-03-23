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

# Login routes
Route::get('/login', ['App\\Http\\Controllers\\LoginController', 'index'])->name('login');
Route::post('/login', ['App\\Http\\Controllers\\LoginController', 'login'])->name('login_check');

# Main routes
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', ['App\\Http\\Controllers\\MainController', 'index'])->name('main');
    Route::get('/history', ['App\\Http\\Controllers\\HistoryController', 'index'])->name('history');
    Route::get('/logout', ['App\\Http\\Controllers\\LoginController', 'logout'])->name('logout');
    Route::get('/refresh', ['App\\Http\\Controllers\\MainController', 'refresh'])->name('refresh');
});
