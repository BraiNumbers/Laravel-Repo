@extends('layouts.app')

  <link rel="stylesheet" type="text/css" href="{{ url('style.css') }}"/>

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
    <div style="position: absolute; padding: 5px; width: 220px;">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
   @endif

    <div class="card col-md-9 mx-auto">
      <div class="card-body">
        <h1 class="card-title">Add task</h1>
          <form action="{{ route('projects.storeTask', request()->project) }}" method="post" class="needs-validation" novalidate>
              @method('POST')
              @csrf
              <div class="form-group row">
                 <label for="validationDescription" class="col-sm-2 col-form-label">User</label>
                   <div class="col-sm-10">
                   <select class="js-example-basic-single" style="width: 100%" name="user_id">
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
                    <button type="submit" class="btn btn-primary float-md-end">Assign</button>
                    <a href="/projects" class="btn btn-link float-md-end mr-1">Cancel</a>
                </form>       
             </div>
           </div>  
        </div>    
        
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

    </div>
@endsection


