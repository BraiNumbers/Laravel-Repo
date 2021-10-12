<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Post;

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
Route::get ('/', function () {
    return view('welcome');});

Route::get('posts/create', 'PostController@create')->name('post.create');
Route::get('create', 'PostController@store')->name('post.store');
Route::get('posts/index', 'PostController@index')->name('post.index');
Route::get('posts/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('update/{id}', 'PostController@update')->name('post.update');
Route::get('delete/{id}', 'PostController@destroy')->name('post.destroy');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
