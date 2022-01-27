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
          My tasks
        </h1>
      </div>  
     
    <ul class="nav nav-tabs" style="border-bottom:0px" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Tasks</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Completed</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">In progress</button>
      </li>
    </ul>
        
   <div class="card col-md-12 mx-auto">
     <div class="card-body">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <br>
          <table class="table">
          <thead>
            <tr>
              <th scope="col">Task</th>
              <th scope="col">Description</th>
              <th scope="col">Project</th>
              <th scope="col">Completed</th>
              <th scope="col"></th>
            </tr>
          </thead>
          @foreach ($tasks as $task)
            <tbody>
              <tr class="table">
                  <td><a data-toggle="modal" data-target="#modal-{{$task->id}}" role="button" class="text-primary" href="{{ route('projects.updateTask',  $task->id) }}">{{ $task->title }}</a></td>
                  <td><a>{!! $task->description !!}</a></td>
                  <td><a href="{{ route('projects.show', $task->project->id) }}">{{ $task->project->name }}</a></td>
                  <td><a>{!! $task->completed ? "✓" : "&times;" !!}</a></td>
                    <td>                    
                      <form action="{{route('projects.deleteTask', [$task->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete this task?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn text-danger">Delete</button>
                      </form>
                    </td>
                   </td>
                 </tr>
              </tbody>
           @endforeach
        </table>
      </div>  
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <br>
            <table class="table">
           <thead>
              <tr>
                <th scope="col">Task</th>
                <th scope="col">Description</th>
                <th scope="col">Project</th>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
              </tr>
            </thead>
              @foreach ($tasks->where('completed', '1') as $task)
                <tr class="table">
                  <td><a data-toggle="modal" data-target="#modal-{{$task->id}}" role="button" class="text-primary" href="{{ route('projects.updateTask',  $task->id) }}">{{ $task->title }}</a></td>
                  <td><a>{!! $task->description !!}</a></td>
                  <td><a href="{{ route('projects.show', $task->project->id) }}">{{ $task->project->name }}</a></td>
                  <td><a>{{ $task->start_date->format('d-m-y') }}</a></td>
                  <td><a>{{ $task->end_date->format('d-m-y') }}</a></td>
                </tr>
              @endforeach
           </tbody>
          </table>
          </div>
         <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
         <br> 
          <table class="table">
           <thead>
              <tr>                
                <th scope="col">Task</th>
                <th scope="col">Description</th>
                <th scope="col">Project</th>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
              </tr>
            </thead>
             @foreach ($tasks->where('completed', '0') as $task)
                <tr class="table">
                  <td><a data-toggle="modal" data-target="#modal-{{$task->id}}" role="button" class="text-primary" href="{{ route('projects.updateTask',  $task->id) }}">{{ $task->title }}</a></td>
                  <td><a>{!! $task->description !!}</a></td>
                  <td><a href="{{ route('projects.show', $task->project->id) }}">{{ $task->project->name }}</a></td>
                  <td><a>{{ $task->start_date->format('d-m-y') }}</a></td>
                  <td><a>{{ $task->end_date->format('d-m-y') }}</a></td>
                </tr>
               @endforeach
            </tbody>
           </table>
        </div> 
      </div>
     
      @foreach ($tasks as $task)
        <div class="modal fade" id="modal-{{$task->id}}" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update task</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
              <form action="{{route('projects.updateTask', $task)}}" id="form" method="post" class="needs-validation" novalidate>
                @method('PUT')
                  @csrf
                  <div class="form-group row">
                    <div class="col-sm-10">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="validationIntro" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" rows="2" value="{{ old('title', $task->title) }}">
                          @error('title') 
                            <small class='text-danger'>{{$message}}</small>
                          @enderror   
                        </div>
                      </div>
                    <div class="form-group row">
                      <label for="validationDescription" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                      <textarea class="form-control Ckeditor" id="description" name="description" rows="2" required>{{ old('description', $task->description) }}</textarea>
                          @error('description') 
                            <small class='text-danger'>{{$message}}</small>
                          @enderror  
                      </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Start date</label>
                      <div class="col-sm-10">
                      <input type="date" onchange="invoicedue(event);" required="" value="{{ $task->start_date->format('Y-m-d') }}"  class="form-control" name="start_date">
                        @error('start_date') 
                          <small class='text-danger'>{{$message}}</small>
                        @enderror 
                      </div>
                    </div>
                  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">End date</label>
                    <div class="col-sm-10">
                    <input type="date" onchange="invoicedue(event);" required="" value="{{ $task->end_date->format('Y-m-d') }}"  class="form-control" name="end_date">
                      @error('end_date') 
                        <small class='text-danger'>{{$message}}</small>
                      @enderror 
                    </div>
                  </div>
                  <div class="mb-3">
                  <label>Completed</label>
                      <input type="checkbox" name="completed" id="completed" {{ $task->completed == 1 ? ' checked' : '' }}>                            
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Update task</button>
                  </div>
                  </form>
                </div>
              </div>  
            </div>    
          </div> 
      @endforeach

      @if (count($errors) > 0)
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#modal-{{$task->id}}').modal('show');
            });
        </script>
      @endif

      <script>
        document.querySelectorAll('.Ckeditor').forEach(element=>{
          ClassicEditor
          .create( element)
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
        })
      </script>
  
@endsection