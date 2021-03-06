<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/send-reset-password', 'AuthController@sendResetPassword');
Route::post('/verify-otp', 'AuthController@verifyOTP');
Route::post('/reset-password', 'AuthController@resetPassword');
// ------------------------------------------
// ------------------Home--------------------
Route::get('/publications/category/{category}', 'PublicationController@categories');
// ------------------------------------------
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', 'UserController@findAll');
    Route::get('/user', 'UserController@findOne');
    Route::get('/profile/{name}', 'UserController@showProfile');
    Route::get('/profile/{name}', 'UserController@showProfile');
    Route::get('/profile/mini/{name}', 'UserController@showProfileforAdmin');
    Route::put('/profile', 'UserController@updateProfile');
    Route::delete('/profile/{name}', 'UserController@destroy');
    //   -----------------------------------------------------
    Route::middleware(['permission:USER'])->group(function () {
        //   -----------------------------------------------------
        Route::get('/products', 'ProductController@index');
        Route::get('/products/{id}', 'ProductController@show');
        Route::post('/products', 'ProductController@store');
        Route::post('/products/{id}', 'ProductController@update');
        Route::delete('/products/{id}', 'ProductController@destroy');
        //   -----------------------------------------------------
        Route::get('/offers', 'OfferController@index');
        Route::get('/offers/{id}', 'OfferController@show');
        Route::post('/offers', 'OfferController@store');
        Route::delete('/offers/{id}', 'OfferController@destroy');
        //   -----------------------------------------------------
        Route::get('/publications/{state}', 'PublicationController@index');
        Route::get('/publication/{id}', 'PublicationController@show');
        Route::post('/publication', 'PublicationController@store');
        Route::post('/publication/update/{id}', 'PublicationController@update');
        Route::delete('/publication/delete/{id}', 'PublicationController@destroy');
        //   -----------------------------------------------------
        Route::post('/categoria', 'CategoriaController@store');
        //   -----------------------------------------------------
        Route::get('/transactions/pubs', 'TruequeController@pubs');
        Route::get('/transactions/offers', 'TruequeController@offers');
        Route::post('/transaction', 'TruequeController@action');
        //   -----------------------------------------------------
        Route::get('/locations', 'LocationController@index');
        Route::get('/locations/detail/{user_id}', 'LocationController@show');
        Route::post('/locations', 'LocationController@store');
        Route::post('/locations/update/{id}', 'LocationController@update');
        Route::delete('/locations/delete/{id}', 'LocationController@destroy');
        //   -----------------------------------------------------
        Route::get('/system-available-products', 'RegisterPriceController@index');
    });

    Route::middleware(['permission:ADMIN'])->group(function () {
        Route::post('/markettype', 'MarkettypeController@store');
        Route::post('/unitmeasure', 'UnitMeasureController@store');
        Route::post('/register_categories', 'RegisterCategoryController@store');
        Route::post('/register_market_sectors', 'RegisterMarketSectorController@store');
        //
        Route::post('/register_system_products', 'RegisterSystemProductController@store');
        Route::post('/register-market', 'RegisterMarketController@store');
        Route::post('/register_price', 'RegisterPriceController@store');

        //
        Route::get('/system_products', 'RegisterSystemProductController@index');
        Route::get('/product_category', 'RegisterCategoryController@index');
        Route::get('/markets', 'RegisterMarketController@index');
        Route::get('/unit_measures', 'UnitMeasureController@index');
        Route::get('/market_types', 'MarkettypeController@index');
        Route::get('/market_sectors', 'RegisterMarketSectorController@index');
    });
});
