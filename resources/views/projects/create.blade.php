@extends('layouts.app')

@section('content')

 <div class="d-flex justify-content-between">

    @auth
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
        <h1 class="card-title">Create project</h1>
           <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
              @method('POST')
              @csrf
              <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" rows="1" required value="{{ old('name') }}"> 
                @error('name') 
                <small class='text-danger'>{{$message}}</small>
                @enderror   
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Intro</label>
                <div class="col-sm-10">
                <textarea id="editor1" class="form-control" name="intro" rows="2" required>{{ old('intro') }}</textarea>
                  @error('intro') 
                  <small class='text-danger'>{{$message}}</small>
                  @enderror   
              </div>
            </div>
              <div class="form-group row">
              <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea id="editor2" class="form-control" name="description" rows="2" required>{{ old('description') }}</textarea>
                    @error('description') 
                      <small class='text-danger'>{{$message}}</small>
                    @enderror  
                </div>
              </div>
              <div class="form-group row">
              <label class="col-sm-2 col-form-label">Project image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="project_image">
                    @error('project_image') 
                    <small class='text-danger'>{{$message}}</small>
                    @enderror  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Start date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="start_date">
                      @error('start_date') 
                      <small class='text-danger'>{{$message}}</small>
                      @enderror   
                  </div>
                </div>
                <div class="form-group row">
                <label class="col-sm-2 col-form-label">End date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="end_date">
                      @error('end_date') 
                      <small class='text-danger'>{{$message}}</small>
                      @enderror   
                  </div>
                </div>
              <a href="/projects" class="col-md-2 float-md-start">Cancel</a>
            <button type="submit" class="btn btn-info float-md-end">Submit project</button>
         </form>       
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