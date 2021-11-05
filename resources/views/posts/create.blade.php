@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-2">
      <div class="card"  style="width: 12rem;">
        <div class="bg-light">
            @include('partials.side-bar')
        </div>
    </div>
  </div>

  <div class="card col-md-9 mx-auto">
      <div class="card-body">
        <h1 class="card-title">Create post</h1>
          <form action="{{route('post.store')}}" method="post" class="needs-validation" novalidate>
              @method('POST')
              @csrf
              <div class="form-group row">
                  <label for="validationTitle" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" placeholder="Enter the title here" name="title" rows="1"  required value="{{ old('title') }}"> 
                  @error('title') 
                  <small class='text-danger'>{{$message}}</small>
                  @enderror   
                  </div>
                  </div>
                  <div class="form-group row">
                  <label for="validationIntro" class="col-sm-2 col-form-label">Intro</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" id="intro" placeholder="Enter the intro here" name="intro" rows="2" required>{{ old('intro') }}</textarea>
                  @error('intro') 
                  <small class='text-danger'>{{$message}}</small>
                  @enderror   
                  </div>
                  </div>
              <div class="form-group row">
                  <label for="validationDescription" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" id="description" placeholder="Enter the description here" name="description" rows="2" required>{{ old('description') }}</textarea>
                  @error('description') 
                  <small class='text-danger'>{{$message}}</small>
                  @enderror  
              </div>
              </div>
              <a href="/posts" class="col-md-2 float-md-start">Cancel</a>
              <button type="submit" class="btn btn-info col-md-2 float-md-end">Submit post</button>
          </form>       
      </div>
  </div>  
</div>    
@endsection



