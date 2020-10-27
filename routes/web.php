<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/about', 'App\Http\Controllers\AboutController@index');

Route::get('/articles', 'App\Http\Controllers\ArticlesController@index');
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show');
Route::put('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');
Route::delete('/articles/{article}', 'App\Http\Controllers\ArticlesController@delete');
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
