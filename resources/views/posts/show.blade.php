@extends('layouts.app')

@section('content')
  <div class="row">
    @auth
        <div class="col-md-2">
          <div class="card" style="width: 12rem;">
            <div class="bg-light">
              @include('partials.side-bar')
            </div>
          </div> 
        </div>
      @endauth

    <div class="card p-0 col-md-9 mx-auto">
      <img src="https://www.lyon-ortho-clinic.com/files/cto_layout/img/placeholder/camera.jpg" style="height: 280px;" class="card-img-top">
          <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->description }}</p>
          <p class="card-text"><small class="text-muted">Published on: {{ $post->created_at->format('d.m.y') }}</small></p>
          <a href="/posts" class="col-md-1">Back</a> 
        </div>
      </div>    
    </div> 
  
@endsection