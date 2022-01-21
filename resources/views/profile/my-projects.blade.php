@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">
    
  @auth
    <div class="row">
      <div class="col-md-2">
        <div class="card" style="width: 12rem;">
          <div class="bg-light">
              @include('partials.side-bar')
          </div>
        </div>
      </div>
    </div>
  @endauth

     <div class="col-md-9">
       <div class="mb-3 d-flex justify-content-between align-items-center">
          <h1>
            My projects
          </h1>
         <a class="btn btn-primary col-md- float-md-end" href="{{ route('projects.create') }}" role="button">Create project</a>
      </div>  
  
       <table class="table table-bordered">
         <thead>
            <tr>
              <th scope="col">Name</th>
              <th colspan="3" scope="col">Leaders</th>
            </tr>
          </thead>
           @foreach ($projects as $project)
            <tbody>
             <tr class="table table-bordered">
              <td><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></td>
                <td><a>{{ $project->leaders()->pluck('name')->join(', ') }}</a></td>
                  @can('update', $project)
                    <td><a href="{{ route('projects.edit',  $project->id) }}" class="btn text-primary">Edit</a></td>
                  @endcan
                <td>
                  @can('delete', $project)
                    <form action="{{route('projects.destroy', ['id' => $project->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete this project?')">
                      @method('DELETE')
                      @csrf
                      <button class="btn text-danger">Delete</button>
                    </form>
                  @endcan
                </td>
              </tr>
              </tbody>
            @endforeach
        </table>
      </div>

</div>
@endsection