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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function () {
    
    Route::post('login', 'UserController@login');
    Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
    
    // Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::get('userAuth', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
    Route::get('welcomeAuth', 'UserController@welcomeAuth')->middleware('jwt.verify');
    
    
    Route::get('category', 'CategoryController@index')->middleware('jwt.verify');
    Route::post('category', 'CategoryController@create')->middleware('jwt.verify');
    Route::patch('/category/{id}', 'CategoryController@update')->middleware('jwt.verify');
    Route::delete('/category/{id}', 'CategoryController@delete')->middleware('jwt.verify');
    
    Route::get('admin', 'AdminController@index')->middleware('jwt.verify');
    Route::post('admin', 'AdminController@create')->middleware('jwt.verify');
    Route::patch('/admin/{id}', 'AdminController@update')->middleware('jwt.verify');
    Route::delete('/admin/{id}', 'AdminController@delete')->middleware('jwt.verify');
    
    Route::get('customer', 'CustomerController@index')->middleware('jwt.verify');
    Route::post('customer', 'CustomerController@create')->middleware('jwt.verify');
    Route::patch('/customer/{id}', 'CustomerController@update')->middleware('jwt.verify');
    Route::delete('/customer/{id}', 'CustomerController@delete')->middleware('jwt.verify');
    
    Route::get('product', 'ProductController@index')->middleware('jwt.verify');
    Route::post('product', 'ProductController@create')->middleware('jwt.verify');
    Route::patch('/product/{id}', 'ProductController@update')->middleware('jwt.verify');
    Route::delete('/product/{id}', 'ProductController@delete')->middleware('jwt.verify');
    
    Route::get('role', 'RoleController@index')->middleware('jwt.verify');
    Route::post('role', 'RoleController@create')->middleware('jwt.verify');
    Route::patch('/role/{id}', 'RoleController@update')->middleware('jwt.verify');
    Route::delete('/role/{id}', 'RoleController@delete')->middleware('jwt.verify');
    
    Route::get('transaction', 'TransactionController@index')->middleware('jwt.verify');
    Route::post('transaction', 'TransactionController@create')->middleware('jwt.verify');
    Route::patch('/transaction/{id}', 'TransactionController@update')->middleware('jwt.verify');
    Route::delete('/transaction/{id}', 'TransactionController@delete')->middleware('jwt.verify');
    
    Route::get('transaction-detail', 'TransactionDetailController@index')->middleware('jwt.verify');
    Route::post('transaction-detail', 'TransactionDetailController@create')->middleware('jwt.verify');
    Route::patch('/transaction-detail/{id}', 'TransactionDetailController@update')->middleware('jwt.verify');
    Route::delete('/transaction-detail/{id}', 'TransactionDetailController@delete')->middleware('jwt.verify');
    
});