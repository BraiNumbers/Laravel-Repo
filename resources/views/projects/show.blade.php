@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ url('style.css') }}" />

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
          {{ $project->name }}
        </h1>
        @auth
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Project actions
          </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @can('update', $project)
                <a class="dropdown-item" href="{{ route('projects.edit',  $project->id) }}" role="button">Edit project</a>
              @endcan
              @can('attach', $project)
                <a class="dropdown-item" href="{{ route('user.add' , $project) }}" role="button">Add user</a>
              @endcan
              @can('addTask', $project)
               <a class="dropdown-item" href="{{ route('projects.task' , $project) }}" data-toggle="modal" data-target="#exampleModal" role="button">Add task</a>
              @endcan	
               @if (count($errors) > 0)
                <script type="text/javascript">
                    $( document ).ready(function() {
                        $('#exampleModal').modal('show');
                    });
                </script>
               @endif
            </div>
          </div>
        @endauth
     </div>

    <ul class="nav nav-tabs" style="border-bottom:0px" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Project</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Users</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Tasks</button>
      </li>
    </ul>

    <div class="card col-md-12 mx-auto">
      <div class="card-body">     
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <br>
                <img src="{{ asset($project->project_image) }}" style="object-fit: cover; height: 250px;" class="card-img-top">
                  <div class="card-body">
                    <p class="card-text">{{ $project->intro }}</p> 
                    <p class="card-text">{!! $project->description !!}</p>
                    <p class="card-text"><small class="text-muted">Start date: {{ $project->start_date->format('d-m-y') }} </br> End date: {{ $project->end_date->format('d-m-y') }}</small></p>
                    <a href="/projects" class="mr-2 float-end">Back</a> 
                  </div>
                </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <br>
                <table class="table">
              <thead>
                  <tr>
                    <th scope="col">Project members</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                  @foreach($project->users as $user)
                    <tr class="table">
                      <td><a>{{ $user->name }}</a></td>
                      <td><a>{{ $user->pivot->role }}</a></td>
                    </tr>
                  @endforeach
              </tbody>
              </table>
              <a href="/projects" class="mr-2 float-end">Back</a> 
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br> 
              <table class="table">
              <thead>
                  <tr>                
                    <th scope="col">Task</th>
                    <th scope="col">User</th>
                    <th scope="col">Completed</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End date</th>
                  </tr>
                </thead>
                  @foreach($project->tasks as $task)
                    <tr class="table">
                      <td><a>{{ $task->title }}</a></td>
                      <td><a>{{ $task->user->name }}</a></td>
                      <td><a>{!! $task->completed ? "✓" : "&times;" !!}</a></td>
                      <td><a>{{ $task->start_date->format('d-m-y') }}</a></td>
                      <td><a>{{ $task->end_date->format('d-m-y') }}</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <a href="/projects" class="mr-2 float-end">Back</a> 
            </div> 
        </div>

      <div class="modal fade" id="exampleModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('projects.storeTask', request()->project) }}" id="form" method="post" class="needs-validation" novalidate>
                  @method('POST')
                    @csrf
                    <div class="form-group row">
                      <label for="validationDescription" class="col-sm-2 col-form-label">User</label>
                        <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" style="width: 100%" name="user_id">
                            @foreach($project->users as $user)
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="validationIntro" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="title" name="title" rows="2" value="{{ old('title') }}">
                            @error('title') 
                              <small class='text-danger'>{{$message}}</small>
                            @enderror   
                          </div>
                        </div>
                      <div class="form-group row">
                        <label for="validationDescription" class="col-sm-2 col-form-label">Description</label>
                          <div class="col-sm-10">
                              <textarea id="editor" class="form-control" id="description" name="description" rows="2" required>{{ old('description') }}</textarea>
                                  @error('description') 
                                    <small class='text-danger'>{{$message}}</small>
                                  @enderror  
                              </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Start date</label>
                              <div class="col-sm-10">
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
                                  @error('start_date') 
                            <small class='text-danger'>{{$message}}</small>
                            @enderror 
                        </div>
                      </div>
                      <div class="form-group row">
                      <label class="col-sm-2 col-form-label">End date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}">
                            @error('end_date') 
                            <small class='text-danger'>{{$message}}</small>
                            @enderror 
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" onclick="handleSubmit()" class="btn btn-primary">Assign task</button>
                      </div>
                   </form>       
                </div>
              </div>  
            </div>    

           <script>
              function handleSubmit () {
                  document.getElementById('form').submit();
              }
           </script>

           <script>
              $(document).ready(function() {
                  $('.js-example-basic-single').select2();
              });
          </script>

          <script>
            ClassicEditor
              .create( document.querySelector( '#editor' ) )
              .then( editor => {
                      console.log( editor );
              } )
              .catch( error => {
                      console.error( error );
              } );
          </script>          
          
@endsection