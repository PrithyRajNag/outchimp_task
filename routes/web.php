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


Route::get('/', 'Auth\LoginController@showLoginForm')->name('customer-login');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::prefix('category')->name('category.')->group(function () {
    Route::get('/', 'CategoryController@index')->name('index');
    Route::get('/create', 'CategoryController@create')->name('create');
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::get('/{category}', 'CategoryController@edit')->name('edit');
    Route::put('/{category}/update', 'CategoryController@update')->name('update');
    Route::delete('/{category}/destroy', 'CategoryController@destroy')->name('destroy');
});
Route::prefix('unit')->name('unit.')->group(function () {
    Route::get('/', 'UnitController@index')->name('index');
    Route::get('/create', 'UnitController@create')->name('create');
    Route::post('/store', 'UnitController@store')->name('store');
    Route::get('/{unit}', 'UnitController@edit')->name('edit');
    Route::put('/{unit}/update', 'UnitController@update')->name('update');
    Route::delete('/{unit}/destroy', 'UnitController@destroy')->name('destroy');
});
Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/create', 'ProductController@create')->name('create');
    Route::post('/store', 'ProductController@store')->name('store');
    Route::get('/{unit}', 'ProductController@edit')->name('edit');
    Route::put('/{unit}/update', 'ProductController@update')->name('update');
    Route::delete('/{unit}/destroy', 'ProductController@destroy')->name('destroy');
});
