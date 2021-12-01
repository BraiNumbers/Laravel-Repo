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

    <div class="card col-md-9 mx-auto">
      <div class="card-body">
      <h1 class="card-title">Update profile</h1>
        <form action="{{route('profile.update', $user)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
          @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" rows="1" value="{{ Auth::user()->name }}" required> 
                @error('name') 
                <small class='text-danger'>{{$message}}</small>
                @enderror   
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" rows="2" value="{{ Auth::user()->email }}" required>
                @error('email') 
                <small class='text-danger'>{{$message}}</small>
                @enderror 
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                <select class="js-example-basic-single" name="city">
                  <option value="Groningen">Groningen</option>
                  <option value="Nunspeet">Nunspeet</option>
                  <option value="Hoogeveen">Hoogeveen</option>
                </select>
               </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Profile image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="profile_image">
                  <img src="{{ asset($user->profile_image) }}" width="88px">
                    @error('profile_image') 
                    <small class='text-danger'>{{$message}}</small>
                    @enderror  
                </div>
              </div>
             <button type="submit" class="btn btn-primary float-md-end">Update profile</button>
            <a href="/profile" class="mr-2 float-md-end">Cancel</a>
          </form>         
  
          <script>
            $(document).ready(function() {
              $('.js-example-basic-single').select2();
            });
          </script>

@endsection




