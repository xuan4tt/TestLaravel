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

Route::get('/', 'AuthController@index')->name('index')->middleware(['CheckLogin', 'CheckLoginAdmin']);
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/registration', 'AuthController@registration')->name('registration');
Route::get('/checkMail', 'AuthController@checkMail')->name('checkMail');

Route::middleware('CheckLogOut')->group(function () {
    Route::get('/market', 'MarketController@index')->name('market');
    Route::post('/sales_registration', 'MarketController@registration')->name('market.registration');
    
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/censor/{id}/{status}', 'AdminController@censor')->name('admin.censor');
});



