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

     <div class="card col-md-9 mx-auto">
        <div class="card-body">
     <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Project</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Users</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                <p class="card-text">{{ $project->intro }}</p> 
                <p class="card-text">{!! $project->description !!}</p>
                <p class="card-text"><small class="text-muted">Start date: {{ $project->start_date->format('d.m.y') }} </br> End date: {{ $project->end_date->format('d.m.y') }}</small></p>
                <a href="/projects" class="mr-2 float-end">Back</a> 
              </div>
            </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <br>
            <table class="table table-bordered">
           <thead>
              <tr>
                <th scope="col">Project members</th>
                <th scope="col">Role</th>
                </tr>
            </thead>
            @foreach($project->users as $user)
            <tr class="table table-bordered">
              <td><a>{{ $user->name }}</a></td>
              <td><a>Insert role here</a></td>
            </tr>
            @endforeach
          </tbody>
          </table>
          <a href="/projects" class="mr-2 float-end">Back</a> 
        </div>
      </div>    
    </div>    

@endsection