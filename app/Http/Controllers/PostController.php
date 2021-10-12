<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        
        return view('posts/index' , [
            'post' => Post::all()
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
        public function store(Request $request)
        
    {
        $this->validate($request, [
            'title' => 'required|unique:posts|min:3',
            'excerpt' => 'required|min:5|max:255'
        ]);
       
        $post = new Post();
        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->save();
        return redirect('posts/index')->with('message', 'The post is saved successfully!');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
        return view('posts.edit')->with('post', $post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
    $this->validate($request, [
        'title' => 'required|min:3',
        'excerpt' => 'required|min:5|max:255'
    ]);

    $post = Post::findorfail($id);
    $post->title = $request->input('title');
    Rule::unique('posts')->ignore('title');
    $post->excerpt = $request->input('excerpt');
    $post->save();
    return redirect('posts/index');
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
        $post->delete();
        return redirect()->back();
    }
    
}
