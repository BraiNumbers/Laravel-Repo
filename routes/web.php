<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Project;
use App\Task;
use Illuminate\Support\Facades\Auth;

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

Route::get ('/posts/create', function () {
    return view('/posts/create');}); 

 Route::get ('/projects/create', function () {
    return view('/projects/create');}); 

Auth::routes();

// AdminController related routes
Route::get('admin/users', 'AdminController@index')->name('admin.index')->middleware('admin');
Route::get('admin/posts', 'AdminController@adminPost')->name('admin.posts')->middleware('admin');
Route::get('admin/projects', 'AdminController@adminProject')->name('admin.projects')->middleware('admin');
Route::get('admin/tasks', 'AdminController@adminTask')->name('admin.tasks')->middleware('admin');
Route::get('admin/create/user', 'AdminController@adminUser')->name('admin.user')->middleware('admin');
Route::post('admin/store', 'AdminController@store')->name('admin.store')->middleware('admin');
Route::delete('admin/delete/user/{id}', 'Admincontroller@destroy')->name('admin.destroyUser')->middleware('admin');

// UserController related routes
Route::get('profile', 'UserController@index')->name('profile')->middleware('auth');  
Route::get('profile/edit/{user}', 'UserController@edit')->name('profile.edit')->middleware('auth');
Route::put('profile/update/{user}', 'UserController@update')->name('profile.update')->middleware('auth');
Route::get('user/posts', 'UserController@posts')->name('user.posts')->middleware('auth');
Route::get('user/projects', 'UserController@projects')->name('user.projects')->middleware('auth');
Route::get('user/tasks', 'UserController@tasks')->name('user.tasks')->middleware('auth');
Route::get('projects/{project}/assign/user', 'UserController@assignUser')->name('user.assign')->middleware('auth');
Route::get('projects/{project}/assign', 'UserController@getUsers')->name('user.add')->middleware('auth');

// PostController related routes
Route::get('posts', 'PostController@index')->name('post.index');
Route::get('posts/show/{id}', 'PostController@showcard')->name('post.showcard');
Route::get('posts/create', 'PostController@create')->name('post.create')->middleware('auth');
Route::post('posts/store', 'PostController@store')->name('post.store')->middleware('auth');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::put('posts/update/{id}', 'PostController@update')->name('post.update')->middleware('auth');
Route::delete('posts/delete/{id}', 'PostController@destroy')->name('post.destroy')->middleware('auth');

// ProjectController related routes
Route::get('projects', 'ProjectController@index')->name('projects.index');
Route::get('projects/show/{project}', 'ProjectController@show')->name('projects.show');
Route::get('projects/create', 'ProjectController@create')->name('projects.create')->middleware('auth');
Route::post('projects/store', 'ProjectController@store')->name('projects.store')->middleware('auth');
Route::get('projects/edit/{id}', 'ProjectController@edit')->name('projects.edit')->middleware('auth');
Route::put('projects/update/{id}', 'ProjectController@update')->name('projects.update')->middleware('auth');
Route::post('projects/{project}/assign', 'ProjectController@assign')->name('projects.assign')->middleware('auth');
Route::delete('projects/{project}/detach/{user}', 'ProjectController@detach')->name('projects.detach')->middleware('auth');
Route::delete('projects/delete/{id}', 'ProjectController@destroy')->name('projects.destroy')->middleware('auth');

// Task related routes
Route::get('projects/{project}/task/create', 'ProjectController@task')->name('projects.task')->middleware('auth');
Route::post('projects/{project}/store/task', 'ProjectController@storeTask')->name('projects.storeTask')->middleware('auth');
Route::put('projects/update/{task}/task', 'ProjectController@updateTask')->name('projects.updateTask')->middleware('auth');
Route::delete('projects/delete/{task}/task', 'ProjectController@deleteTask')->name('projects.deleteTask')->middleware('auth');