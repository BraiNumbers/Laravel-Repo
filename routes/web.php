<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Post;
use App\User;

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
// request methods = GET, POST, PUT, DELETE

Route::get ('/', function () {
    return view('welcome');});

Route::get ('/posts/my-post', function () {
    return view('/posts/my-post');})->middleware('auth');

Route::get ('/posts/posts', function () {
    return view('/posts/posts');});  

Auth::routes();

Route::get('/profile', 'UserController@index')->name('profile');  
Route::get('profile/edit/{user}', 'UserController@edit')->name('profile.edit')->middleware('auth');
Route::put('profile/update/{user}', 'UserController@update')->name('profile.update')->middleware('auth');

Route::get('user/posts/{id}', 'UserController@posts')->name('user.posts')->middleware('auth');

Route::get('posts/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('posts/store', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('posts/{id}', 'PostController@showcard')->name('post.showcard');
Route::get('posts', 'PostController@index')->name('post.index');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::put('posts/update/{id}', 'PostController@update')->name('post.update')->middleware('auth');
Route::delete('posts/delete/{id}', 'PostController@destroy')->name('post.destroy')->middleware('auth');




