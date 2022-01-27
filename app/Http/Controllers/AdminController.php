<?php

namespace App\Http\Controllers;

use App\Post;
use App\Project;
use App\User;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->except(Auth::id());

        return view('admin/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::findorfail($user);

        $user->posts()->delete();

        $user->projects()->delete();

        $user->tasks()->delete();

        $user->delete();

        return back()->with(['message' => $user->name . ' has been deleted from the website']);
    }

    public function adminPost()
    {
        $posts = Post::all();

        return view('admin/posts', compact('posts'));
    }

    public function adminProject()
    {
        $projects = Project::all();

        return view('admin/projects', compact('projects'));
    }

    public function adminTask()
    {
        $tasks = Task::all();

        return view('admin/tasks', compact('tasks'));
    }
}
