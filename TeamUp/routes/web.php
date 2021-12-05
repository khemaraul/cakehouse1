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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
//Route::get('/layouts/emailInbox', [App\Http\Controllers\HomeController::class, 'store'])->name('layouts.emailInbox');
Route::get('/oauth/gmail', [App\Http\Controllers\DashboardController::class, 'login']);

Route::get('/oauth/gmail/callback', [App\Http\Controllers\DashboardController::class, 'index'] );

Route::get('/oauth/gmail/logout', [App\Http\Controllers\DashboardController::class, 'logout']);
