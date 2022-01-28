<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('posts/posts' , [
            'posts' => Post::orderBy('updated_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request) 
    {
        Post::create([
            'title' => $request->title,
            'intro' => $request->intro,
            'description' => $request->description,
            'post_image' => $request->post_image->store('images/posts'),
            'author_id' => auth()->id()
        ]);
        
        return redirect('/posts')->with(['message' => 'The post has been created', 'alert']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {       
        return view('posts/my-post' , [
            'post' => Post::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function showcard($id)
    {
        $post = Post::findorfail($id);
        
        return view('/posts/show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);

        $this->authorize('update', $post);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findorfail($id);

        $this->authorize('update', $post);

        $post->title = $request->title;
        $post->intro = $request->intro;
        $post->description = $request->description;
        if($request->has('post_image')) {
            Storage::delete(asset($post->post_image)); 
            $post->post_image = $request->post_image->store('images/posts');  
        }

        $post->save();

        return redirect('/posts')->with(['message' => 'The '. $post->title . ' has been updated', 'alert']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post = Post::findorfail($post);

        $this->authorize('delete', $post);

        Storage::delete($post->post_image);
        
        $post->delete();
        
        return back()->with(['message' => 'The '. $post->title . ' has been deleted', 'alert']);
    }
        
}
