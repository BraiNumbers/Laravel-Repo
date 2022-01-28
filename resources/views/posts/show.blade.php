@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">
    
  @auth
    <div class="row">
      <div class="col-md-2">
        <div class="card" style="width: 12rem;">
          <div class="bg-light">
              @include('partials.side-bar')
          </div>
        </div>
      </div>
    </div>
  @endauth

    <div class="col-md-9">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1>
          {{ $post->title }}
        </h1>
        @auth
        <a class="btn btn-primary col-md- float-md-end" href="{{ route('post.create') }}" role="button">Create post</a>
        @endauth
     </div>

    <div class="card col-md-12 mx-auto">
      <img src="{{ asset($post->post_image) }}" style="object-fit: cover; height: 250px;">
          <div class="card-body">
          <p class="card-text">{!! $post->description !!}</p>
          <p class="card-text"><small class="text-muted">Published on: {{ $post->created_at->format('d-m-y') }}</small></p>
          <a href="/posts" class="mr-2 float-end">Back</a> 
        </div>
      </div>    
    </div> 
  
</div>
@endsection