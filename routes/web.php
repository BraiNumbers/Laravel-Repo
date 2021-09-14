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

Route::get('/create', function () {
    return view('create')->with("posts",Post::all());
})->name('create');

Route::post('/create', function (Request $request) {
    $post = new Post();
    $post->title = $request->input('title');
    $post->save();
    return redirect('create')->with('succes', 'Post is geplaatst ' . $post->title);
})->name('create');


Route::get('blogs', function () {
    return view('blogs' , [
        'post' => Post::all()
    ]);
});


Route::get('post/{post}', function (Post $post) {
        return view('post' , [
            'post' => $post
        ]);
    });
