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

    @if(session()->has('message'))
      <div style="position: absolute; padding: 5px; width: 290px;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif

    <div class="col-md-9">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1>
          Posts
        </h1>
        @auth
          <a class="btn btn-primary" href="/posts/create" role="button">Create post</a>
        @endauth
     </div>
    
      
  <div class="row justify-content-between">
      @foreach ($posts as $post)
        <div class="card mb-3 p-0" style="width: 15rem;">
          <img class="card-img-top" src="https://www.slashgear.com/wp-content/uploads/2015/10/default-placeholder-1024x1024-960x540.jpg">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->intro }}</p>
            <a href="{{ route('post.showcard', $post->id) }}" class="btn btn-secondary">Read more</a>
          </div>
         </div> 
        @endforeach 
      </div>
    </div>
  </div>

    
@endsection