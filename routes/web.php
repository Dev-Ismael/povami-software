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
Auth::routes(['verify' => true]);


// Web
Route::group( ['namespace' => 'Web'] ,function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/works', 'WorkController@index')->name('works');

    // Account Page
    Route::get('/account', 'AccountController@index')->name('account');
    Route::get("/account/contract/show/{id}" , "AccountController@showContract");
    Route::get("/account/payment_method/show/{id}" , "AccountController@showPaymentMethod");
    Route::post("/account/coupon/search" , "AccountController@searchCoupon");
    Route::post("/account/user/update" , "AccountController@updateUserInfo");

});




// Affiliate
Route::group( [ 'prefix'=>'affiliate' , 'namespace' => 'Affiliate' , 'as' => 'affiliate.'] ,function(){

    // Auth
    Auth::routes(['verify' => true]);


    //    // Auth
    //    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    //    Route::post('/login', 'CustomLoginController@login')->name('login');
    //    Route::get('/register', 'AuthController@showRegisterForm')->name('register');
    //    Route::post('/register', 'AuthController@register')->name('register');


    Route::get('/', 'AffiliateController@index')->name('overview');
    // Route::get('/commission', 'CommissionController@index')->name('commission');

});


// Admin
Route::group( ['prefix'=>'admin' , 'namespace'=> 'Admin' , 'middleware'=> 'admin'] ,function(){

    // Dashboard Page
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    // Users Page
    Route::get("/users" , "UserController@index")->name('users.index');
    Route::post("/users" , "UserController@store")->name('users.store');
    Route::get("/users/show/{id}" , "UserController@show")->name('users.show');
    Route::post("/users/update/{id}" , "UserController@update")->name('users.update');
    Route::post("/users/delete/{id}" , "UserController@destroy")->name('users.delete');
    Route::post("/users/search" , "UserController@search")->name('users.search');


    // Affiliators Page
    Route::get("/affiliators" , "AffiliateController@index")->name('affiliators.index');
    Route::post("/affiliators" , "AffiliateController@store")->name('affiliators.store');
    Route::get("/affiliators/show/{id}" , "AffiliateController@show")->name('affiliators.show');
    Route::post("/affiliators/update/{id}" , "AffiliateController@update")->name('affiliators.update');
    Route::post("/affiliators/delete/{id}" , "AffiliateController@destroy")->name('affiliators.delete');
    Route::post("/affiliators/search" , "AffiliateController@search")->name('affiliators.search');


    // payment_methods Page
    Route::get("/payment_methods" , "PaymentMethodController@index")->name('payment_methods.index');
    Route::post("/payment_methods" , "PaymentMethodController@store")->name('payment_methods.store');
    Route::get("/payment_methods/show/{id}" , "PaymentMethodController@show")->name('payment_methods.show');
    Route::post("/payment_methods/update/{id}" , "PaymentMethodController@update")->name('payment_methods.update');
    Route::post("/payment_methods/delete/{id}" , "PaymentMethodController@destroy")->name('payment_methods.delete');


    // works Page
    Route::get("/works" , "WorkController@index")->name('works.index');
    Route::post("/works" , "WorkController@store")->name('works.store');
    Route::get("/works/show/{id}" , "WorkController@show")->name('works.show');
    Route::post("/works/update/{id}" , "WorkController@update")->name('works.update');
    Route::post("/works/delete/{id}" , "WorkController@destroy")->name('works.delete');


    // Contracts Page
    Route::get("/contracts" , "ContractController@index")->name('contracts.index');
    Route::post("/contracts" , "ContractController@store")->name('contracts.store');
    Route::get("/contracts/show/{id}" , "ContractController@show")->name('contracts.show');
    Route::post("/contracts/update/{id}" , "ContractController@update")->name('contracts.update');
    Route::post("/contracts/delete/{id}" , "ContractController@destroy")->name('contracts.delete');


    // Orders Page
    Route::get("/orders" , "OrderController@index")->name('orders.index');
    Route::post("/orders" , "OrderController@store")->name('orders.store');
    Route::get("/orders/show/{id}" , "OrderController@show")->name('orders.show');
    Route::post("/orders/update/{id}" , "OrderController@update")->name('orders.update');
    Route::post("/orders/delete/{id}" , "OrderController@destroy")->name('orders.delete');

});
