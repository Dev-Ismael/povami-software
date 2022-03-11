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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/works', [App\Http\Controllers\WorkController::class, 'index'])->name('works');
Route::get('/affiliate', [App\Http\Controllers\AffiliateController::class, 'index'])->name('affiliate');
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
