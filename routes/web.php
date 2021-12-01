<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Project;

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

Route::get ('/posts/posts', function () {
    return view('/posts/posts');});  

Route::get ('/posts/create', function () {
    return view('/posts/create');}); 

Auth::routes();

// PostController related routes
Route::get('posts', 'PostController@index')->name('post.index');
Route::get('posts/{id}', 'PostController@showcard')->name('post.showcard');
Route::get('posts/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('posts/store', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::put('posts/update/{id}', 'PostController@update')->name('post.update')->middleware('auth');
Route::delete('posts/delete/{id}', 'PostController@destroy')->name('post.destroy')->middleware('auth');

// ProjectController related routes
Route::get('projects', 'ProjectController@index')->name('projects.index');
Route::get('projects/show/{id}', 'ProjectController@show')->name('projects.show');
Route::get('projects/create', 'ProjectController@create')->name('projects.create')->middleware('auth');
Route::post('projects/store', 'ProjectController@store')->name('projects.store')->middleware('auth');
Route::get('projects/edit/{id}', 'ProjectController@edit')->name('projects.edit')->middleware('auth');
Route::put('projects/update/{id}', 'ProjectController@update')->name('projects.update')->middleware('auth');
Route::post('/projects/{project}/assign/{user}', 'ProjectController@assign')->name('projects.assign')->middleware('auth');
Route::delete('projects/{project}/detach/{user}', 'ProjectController@detach')->name('projects.detach')->middleware('auth');
Route::delete('projects/delete/{id}', 'ProjectController@destroy')->name('projects.destroy')->middleware('auth');

// UserController related routes
Route::get('/profile', 'UserController@index')->name('profile');  
Route::get('profile/edit/{user}', 'UserController@edit')->name('profile.edit')->middleware('auth');
Route::put('profile/update/{user}', 'UserController@update')->name('profile.update')->middleware('auth');
Route::get('user/posts', 'UserController@posts')->name('user.posts')->middleware('auth');
Route::get('user/projects', 'UserController@projects')->name('user.projects')->middleware('auth');
Route::get('/projects/{project}/assign', 'UserController@getUsers')->name('user.add')->middleware('auth');





