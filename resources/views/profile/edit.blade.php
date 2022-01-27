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

    <div class="col-md-9">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1>
          Update profile
        </h1>
     </div>
    
     <div class="card col-md-12 mx-auto">
        <div class="card-body">
        <br>
        <form action="{{route('profile.update', $user)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
          @method('PUT')
            @csrf
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" id="name" name="name" rows="1" value="{{ old('name', $user->name) }}" required> 
                    @error('name') 
                     <small class='text-danger'>{{$message}}</small>
                    @enderror   
                  </div>
                </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email address</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" id="email" name="email" rows="1" value="{{ old('email', $user->email) }}" required> 
                </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" id="city" name="city" rows="1" value="{{ old('city', $user->city) }}" required>
                  @error('city') 
                    <small class='text-danger'>{{$message}}</small>
                  @enderror  
                </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Profile image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="profile_image">
                  <img src="{{ asset($user->profile_image) }}" width="100px">
                    @error('profile_image') 
                      <small class='text-danger'>{{$message}}</small>
                    @enderror  
                </div>
              </div>
            <button type="submit" class="btn btn-primary float-md-end">Update profile</button>
          <a href="/profile" class="btn btn-link float-md-end mr-1">Cancel</a>
       </form>         
  
  @endsection




