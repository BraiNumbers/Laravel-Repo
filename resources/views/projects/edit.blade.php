@extends('layouts.app')

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
  
  <div class="card col-md-9 mx-auto">
        <div class="card-body">
          <h1 class="card-title">Update project</h1>
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
                      <textarea id="editor1" class="form-control" name="intro" rows="2" required>{{ old('intro', $project->intro) }}</textarea>
                      @error('intro') 
                      <small class='text-danger'>{{$message}}</small>
                      @enderror    
                    </div>
                 </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                      <textarea id="editor2" class="form-control" name="description" rows="2" required>{{ old('description', $project->description) }}</textarea>
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
              <a href="{{ route('projects.index') }}" class="col-md-2 float-md-start">Cancel</a>
              <button type="submit" class="btn btn-info col-md-3 float-md-end">Update project</button>
           </form>       
        </div>
      </div>  
    </div>     
   
    <script>
          ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>

    <script>
          ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>
 
 </div>
@endsection