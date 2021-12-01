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

   <div class="col-md-9">
    <div class="mb-3 d-flex justify-content-between align-items-center">
      <h1>
        Profile of {{ Auth::user()->name }} 
      </h1>
  </div>

   <div class="card w-150">
    <div class="card-img-top d-flex align-center">
      <img class="img-fluid" src="{{ asset($user->profile_image) }}" width="150px">
     <div>
  </div>

  @if(session()->has('message'))
    <div style="position: absolute; padding: 5px; width: 320px;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
               
    <div class="card-body">
      <a href="{{ route('profile.edit', $user) }}" class="btn float-right btn-primary">Edit profile</a>
      <h4 class="card-title">User details:</h4>
      <p class="card-title">Name: {{ Auth::user()->name }} </p>
      <p class="card-title">Email: {{ Auth::user()->email }}</p>
      <p class="card-title">City: {{ Auth::user()->city }}</p>
    </div>

@endsection
