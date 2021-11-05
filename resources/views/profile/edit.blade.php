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
        <form action="{{route('profile.update', $user)}}" method="post">
          @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Change the name here" name="name" rows="1" value="{{ Auth::user()->name }}" required> 
                @error('name') 
                <small class='text-danger'>{{$message}}</small>
                @enderror   
              </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="Change the email address here" name="email" rows="2" value="{{ Auth::user()->email }}" required>
                @error('email') 
                <small class='text-danger'>{{$message}}</small>
                @enderror 
              </div>
            </div>
            <a href="/profile" class="col-md-2 float-md-start">Cancel</a>
            <button type="submit" class="btn btn-info col-md-2 float-md-end">Update profile</button>
        </form>         
  
@endsection




