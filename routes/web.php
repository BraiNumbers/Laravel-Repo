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

Route::get('posts/create', function () {
    return view('posts/create');
})->name('post.create');

Route::get('create', 'PostController@store')->name('post.store');

Route::get('posts/index', function () {
    return view('posts/index' , [
        'post' => Post::all()
    ]);
});

Route::get('posts/edit/{id}', 'PostController@edit')->name('post.edit');

Route::post('update/{id}', 'PostController@update')->name('post.update');

Route::get('delete/{id}', 'PostController@destroy')->name('post.destroy');

