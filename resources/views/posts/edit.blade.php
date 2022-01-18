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

    <div class="card col-md-9 mx-auto">
        <div class="card-body">
          <h1 class="card-title">Update post</h1>
            <form action="{{route('post.update', $post->id)}}"  method="post" class="needs-validation" novalidate>
              @method("PUT")    
              @csrf
                <div class="form-group row">
                  <label for="validationTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="title" placeholder="Enter the title here" name="title" rows="1" value="{{ old('title', $post->title) }}" required> 
                      @error('title') 
                      <small class='text-danger'>{{$message}}</small>
                      @enderror  
                   </div>
                 </div>
                  <div class="form-group row">
                   <label for="validationIntro" class="col-sm-2 col-form-label">Intro</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="description" placeholder="Enter the intro here" name="intro" rows="2" required>{{ old('intro', $post->intro) }}</textarea>
                      @error('intro') 
                      <small class='text-danger'>{{$message}}</small>
                      @enderror    
                    </div>
                 </div>
               <div class="form-group row">
                 <label for="validationDescription" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                      <textarea id="editor" class="form-control" id="description" placeholder="Enter the description here" name="description" rows="2" required>{{ old('description', $post->description) }}</textarea>
                      @error('description') 
                      <small class='text-danger'>{{$message}}</small>
                      @enderror    
                  </div>
                </div>
                <button type="submit" class="btn btn-primary float-md-end">Update</button>
              <a href="{{ route('user.posts', Auth::id()) }}" class="btn btn-link float-md-end mr-1">Cancel</a>
             
           </form>       
        </div>
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
