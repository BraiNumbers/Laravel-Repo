<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Project;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, User $user)
    {
        return view('profile/show')->with('user', auth()->user());
    }

    public function posts() {

        $posts = auth()->user()->posts;

        return view('posts/my-post')->with('posts', $posts);
    }
   
    public function projects() {

        $projects = auth()->user()->projects;

        return view('profile/my-projects')->with('projects', $projects);
    }

    public function edit(User $user)   {

        $this->authorize('update', $user);

        return view('profile.edit')->with('user', $user);
    }

    public function update(Request $request, User $user) {

        $this->validate($request, [
            'name' => 'required|min:3|max:15',
            'email' => 'required|min:10|max:30',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect('/profile')->with(['message' => 'The profile update was successful', 'alert' => 'alert-success']);
    }
    
    public function getUsers(Project $project) {

        $this->authorize('attach', $project);

        $users = User::orderBy('name')->where('id', '!=' , $project->user)
        ->whereNotIn('id', $project->users->pluck('id'))->get();

        return view('/projects/assign')->with('users', $users)->with('project', $project);
    }
}
