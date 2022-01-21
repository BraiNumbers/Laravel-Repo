@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ url('style.css') }}" />

@section('content')

<div class="d-flex justify-content-between">
    
    <div class="row">
      <div class="col-md-2">
        <div class="card" style="width: 12rem;">
          <div class="bg-light">
              @include('partials.side-bar')
          </div>
        </div>
      </div>
    </div>

    @if(session()->has('message'))
    <div style="position: absolute; padding: 5px; width: 290px;">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
   @endif

    <div class="col-md-9">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1>
          Update project
        </h1>
     </div>

    <div class="card col-md-12 mx-auto">
        <div class="card-body">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Edit</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Users</button>
          </li>
         </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
         <br>
          <form action="{{route('projects.update', $project)}}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
              @method("PUT")    
              @csrf
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" rows="1" value="{{ old('name', $project->name) }}" required> 
                      @error('name') 
                        <small class='text-danger'>{{$message}}</small>
                      @enderror  
                   </div>
                 </div>
                  <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Intro</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="intro" rows="2" required>{{ old('intro', $project->intro) }}</textarea>
                       @error('intro') 
                         <small class='text-danger'>{{$message}}</small>
                       @enderror    
                    </div>
                 </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea id="editor" class="form-control" name="description" rows="2" required>{{ old('description', $project->description) }}</textarea>
                      @error('description') 
                        <small class='text-danger'>{{$message}}</small>
                      @enderror    
                  </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Project image</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="project_image">
                          <img src="{{ asset($project->project_image) }}" width="100px">
                            @error('project_image') 
                              <small class='text-danger'>{{$message}}</small>
                            @enderror  
                        </div>
                      </div>  
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Start date</label>
                      <div class="col-sm-10">
                        <input type="date" onchange="invoicedue(event);" required="" value="{{ $project->start_date->format('Y-m-d') }}"  class="form-control" name="start_date">
                          @error('start_date') 
                            <small class='text-danger'>{{$message}}</small>
                          @enderror   
                      </div>
                   </div>
                 <div class="form-group row">
                  <label class="col-sm-2 col-form-label">End date</label>
                    <div class="col-sm-10">
                      <input type="date" onchange="invoicedue(event);" required="" value="{{ $project->end_date->format('Y-m-d') }}" class="form-control" name="end_date">
                        @error('end_date') 
                          <small class='text-danger'>{{$message}}</small>
                        @enderror   
                    </div>
                 </div>
                 <button type="submit" class="btn btn-primary float-md-end">Update project</button>
               <a href="{{ route('projects.index') }}" class="btn btn-link float-md-end mr-1">Cancel</a>
             </form>       
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br>
              <a class="btn btn-primary float-md-end mr-1" href="{{ route('user.add' , $project) }}" role="button">Add user</a>
              <br><br>
              <tbody>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Project members</th>
                  <th colspan="3" scope="col">Role</th>
                </tr>
              </thead>
                @foreach($project->users as $user)
                <tr class="table table-bordered">
                  <td><a>{{ $user->name }}</a></td>
                  <td><a>{{ $user->pivot->role }}</a></td>
                  <td>
                <form action="{{route('projects.detach', ['project'=>$project, 'user'=>$user]) }}" method="post" onclick="return confirm('Are you sure you want to delete this user?')">
                  @method('DELETE')
                  @csrf
                  <button class="btn text-danger">Delete</button>
                </form>
              </td>
             </tr>
            @endforeach
          </tbody>
         </table>
        </div>
       </div>  
     </div> 
           
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