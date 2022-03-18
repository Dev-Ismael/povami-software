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

// Auth
Auth::routes();


// Web
Route::group( ['namespace' => 'Web'] ,function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/works', 'WorkController@index')->name('works');
    Route::get('/affiliate', 'AffiliateController@index')->name('affiliate');
    Route::get('/account', 'AccountController@index')->name('account');
});

// Admin
Route::group( ['prefix'=>'admin' , 'namespace'=> 'Admin' , 'middleware'=> 'admin'] ,function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource("/users" , "UserController");
});
