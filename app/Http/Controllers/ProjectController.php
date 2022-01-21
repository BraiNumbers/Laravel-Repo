<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\UpdateTaskRequest;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/projects/index' , [
            'projects' => Project::orderBy('updated_at', 'DESC')->get()    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create([
            'name' => $request->name,
            'intro' => $request->intro,
            'description' => $request->description,
            'project_image' => $request->project_image->store('images/projects'),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'author_id' => auth()->id()
        ]);

        $project->users()->attach(auth()->id());

        return redirect(route('projects.index'))->with(['message' => $project->name . ' has been created', 'alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findorfail($id);
        
        return view('/projects/show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::with(['users'])->where('id', '=', $id)->first();

        $this->authorize('update', $project);

        return view('projects.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest  $request, $id)
    {
        $project = Project::findorfail($id);

        $project->name = $request->name;
        $project->intro = $request->intro;
        $project->description = $request->description;
        if($request->has('project_image')) {
            Storage::delete(asset($project->project_image)); 
            $project->project_image = $request->project_image->store('images/projects');  
        }
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
       
        $project->save();

        return redirect('/projects')->with(['message' =>'The '. $project->name . ' has been updated', 'alert' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        $project = Project::findorfail($project);

        $this->authorize('delete', $project);

        $project->users()->detach();

        Storage::delete($project->project_image);

        $project->delete();

        return back()->with(['message' => $project->name . ' has been deleted', 'alert' => 'alert-success']);
    }

    public function assign(Request $request, Project $project) {
        $request->validate([
            'user' => 'exists:users,id',
            'role' => 'required',
            'task' => 'max:255'
        ]);

        $user=User::find($request->user);

        $project->users()->attach([$request->user => ['role' => $request['role']]]);

        return back()->with(['message' => $user->name . ' has been added to ' . $project->name, 'alert' => 'alert-success']);

    }
    
    public function detach(Project $project, User $user) {
        
        $project->users()->detach($user->id);

        return back()->with(['message' => $user->name . ' has been removed from ' . $project->name, 'alert' => 'alert-success']);

   }

   public function task(Request $request, $task) {

        $task = Task::findorfail($task);

        return view('projects.task')->with('task', $task);
   }

  public function storeTask(StoreTaskRequest $request, Project $project) {
        
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'project_id' => $project->id,
            'user_id' => $request->user_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'completed' => false
        ]);

        $this->authorize('addTask', $project);

        return back()->with(['message' => $task->title . ' has been added to ' . $project->name, 'alert' => 'alert-success']);
      
  }

  public function updateTask(UpdateTaskRequest $request, Task $task) {
   
    $task->title = $request->title;
    $task->description = $request->description;
    $task->start_date = $request->start_date;
    $task->end_date = $request->end_date;
    $task->completed = $request->has('completed');

    $task->save();

    return back()->with(['message' => $task->title . ' has been updated ', 'alert' => 'alert-success']);
    
  }

  public function deleteTask($task) {

    $task = Task::findorfail($task);

    $task->delete();

    return back()->with(['message' => $task->title . ' has been removed from ' . $task->project->name, 'alert' => 'alert-success']);

  }
}
