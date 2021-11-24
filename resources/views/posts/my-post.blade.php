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

  <div class="card col-9 mx-auto">
     <div class="card-body">
      <a class="btn btn-info col-md- float-md-end" href="/posts/create" role="button">Create post</a>
          <h1 class="card-title">My posts</h1> 
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Post title</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
            @foreach ($posts as $post)
              <tbody>
                <tr class="table table-bordered">
                  <td><a href="{{ route('post.showcard', $post->id) }}" class="btn text">{{ $post->title }}</a></td>
                  <td><a href="{{ route('post.edit', $post->id) }}" class="btn text-primary">Edit</a></td>
                  <td>
                    <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post">
                      @method('DELETE')
                      @csrf
                      <button class="btn text-danger">Delete</button>
                    </form> 
                   </td> 
                 </tr>
            </tbody>
           @endforeach
       </table>
   </div>
      
    @if(session()->has('message'))
      <div style="position: absolute; padding: 5px; width: 290px;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif
    
  </div>

@endsection