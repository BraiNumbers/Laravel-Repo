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
           Task section
        </h1>
     </div>

     <table class="table table-bordered">
       <thead>
          <tr>
            <th scope="col" colspan="3">Task</th>
          </tr>
        </thead>
            @foreach ($tasks as $task)
             <tbody>
              <tr class="table table-bordered">
              <td><a data-toggle="modal" data-target="#modal-{{$task->id}}" role="button" class="text-primary" href="{{ route('projects.updateTask',  $task->id) }}">{{ $task->title }}</a></td>
              <td><a>{!! $task->completed ? "✓" : "&times;" !!}</a></td>
                <td>
                  <form action="{{route('projects.deleteTask', [$task->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete this task?')">
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