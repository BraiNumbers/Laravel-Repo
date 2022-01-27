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

    <div class="col-md-9">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1>
          Create post
        </h1>
     </div>

     <div class="card col-md-12 mx-auto">
        <div class="card-body">
          <br>
          <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
              @method('POST')
              @csrf
             <div class="form-group row">
              <label for="validationTitle" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" rows="1"  required value="{{ old('title') }}"> 
                    @error('title') 
                     <small class='text-danger'>{{$message}}</small>
                    @enderror   
                </div>
              </div>
             <div class="form-group row">
             <label for="validationIntro" class="col-sm-2 col-form-label">Intro</label>
               <div class="col-sm-10">
                 <textarea class="form-control" id="intro" name="intro" rows="2" required>{{ old('intro') }}</textarea>
                    @error('intro') 
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
               <label class="col-sm-2 col-form-label">Post image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="post_image">
                    @error('post_image') 
                    <small class='text-danger'>{{$message}}</small>
                    @enderror  
                </div>
              </div>
              <button type="submit" class="btn btn-primary float-md-end">Submit post</button>
             <a href="/posts" class="btn btn-link float-md-end mr-1">Cancel</a>
           </form>       
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



