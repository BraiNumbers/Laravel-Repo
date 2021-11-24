@extends('layouts.app')

@section('content')
 
    @auth
     <div class="row">
       <div class="col-md-2">
        <div class="card" style="width: 12rem;">
          <div class="bg-light">
            @include('partials.side-bar')
          </div>
        </div> 
      </div>
     @endauth

    <div class="card p-0 col-md-9 mx-auto">
      @if(session()->has('message'))
        <div style="position: absolute; padding: 5px; width: 410px;">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
       @endif  
      <img src="{{ asset($project->project_image) }}" style="object-fit: cover; height: 250px;" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{ $project->name }}</h5>
            <p class="card-text">{!! $project->intro !!}</p> 
            <p class="card-text">{!! $project->description !!}</p>
            <p class="card-text"><small class="text-muted">Start date: {{ $project->start_date->format('m.d.y') }} </br> End date: {{ $project->end_date->format('m.d.y') }}</small></p>
            <a href="/projects" class="col-md-1">Back</a> 
            @auth
            @if(auth()->user()->id == $project->owner_id)
            <a class="btn btn-info col-md- float-md-end" href="{{ route('user.add' , $project) }}" role="button">Add user</a>
            @endif
            @endauth
         <table class="table table-bordered">
           <thead>
              <tr>
                <th scope="col">Project members</th>
                <th scope="col">Role</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($project->users as $user)
              <tr class="table table-bordered">
                <td><a>{{ $user->name }}</a></td>
                <td><a>Filler text</a></td>
                @auth
                @if(auth()->user()->id == $project->owner_id)
                <td>
                <form action="{{route('projects.detach', ['project' => $project, 'user' => $user]) }}" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn text-danger">Delete</button>
                </form>
               </td>
               @endif
               @endauth
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>    
    </div> 

@endsection