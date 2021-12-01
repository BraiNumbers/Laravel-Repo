@extends('layouts.app')

@section('content')

  
    @auth
      <div class="row">
        <div class="col-md-2">
          <div class="card" style="width: 12rem;">
            <div class="bg-light">
              @include('partials.side-bar')
            </div>
          </div> 
        </div>
      @endauth

    <div class="card p-0 col-md-9 mx-auto">
      <img src="https://www.slashgear.com/wp-content/uploads/2015/10/default-placeholder-1024x1024-960x540.jpg" style="object-fit: cover; height: 250px;" class="card-img-top">
          <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <p class="card-text">{!! $post->description !!}</p>
          <p class="card-text"><small class="text-muted">Published on: {{ $post->created_at->format('d-m-y') }}</small></p>
          <a href="/posts" class="col-md-1 float-end">Back</a> 
        </div>
      </div>    
    </div> 
  
@endsection