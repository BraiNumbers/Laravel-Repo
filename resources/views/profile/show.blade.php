@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ url('style.css') }}" />

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
      <a href="{{ route('profile.edit', $user) }}" class="btn float-right btn-primary">Edit profile</a>
    </div>

    <div class="card w-150">
      <div class="card-img-top d-flex align-center">
        <img class="img-fluid" src="{{ asset($user->profile_image) }}" width="150px">
      <div>
    </div>

    <div class="card-body">
      <h4 class="card-title">User details:</h4>
      <p class="card-text">Name: {{ Auth::user()->name }} </p>
      <p class="card-text">Email address: {{ Auth::user()->email }}</p>
      <p class="card-text">City: {{ Auth::user()->city }}</p>
    </div>

@endsection
