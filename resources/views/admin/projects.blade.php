@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">

      <div class="row">
         <div class="col-md-2">
            <div class="card" style="width: 12rem;">
               <div class="bg-light">
                  @include('partials.admin-bar')
               </div>
            </div>
          </div>
        </div>   
        
    <div class="col-md-9">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1>
           Project section
        </h1>
          <a class="btn btn-primary col-md- float-md-end" href="{{ route('projects.create') }}" role="button">Create project</a>
       </div>

     <table class="table table-bordered">
       <thead>
          <tr>
            <th scope="col" colspan="3">Project</th>
          </tr>
        </thead>
            @foreach ($projects as $project)
            <tbody>
              <tr class="table table-bordered">
              <td><a href="{{ route('projects.show', $project->id) }}" class="">{{ $project->name }}</td>
              <td><a href="{{ route('projects.edit',  $project->id) }}" class="btn text-primary">Edit</a></td>
                <td>
                  <form action="{{route('projects.destroy', ['id' => $project->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete this project?')">
                      @method('DELETE')
                      @csrf
                      <button class="btn text-danger">Delete</button>
                   </form>
                </td>
              </tr>
              </tbody>
            @endforeach 
        </table>
      </div>

@endsection