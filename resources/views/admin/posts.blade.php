@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">

      <div class="row">
         <div class="col-md-2">
            <div class="card" style="width: 12rem;">
                <div class="bg-light">
                    @include('partials.admin-bar')
                </div>
            </div>
          </div>
        </div>    
        
    <div class="col-md-9">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1>
           Post section
        </h1>
        @auth
          <a class="btn btn-primary" href="/posts/create" role="button">Create post</a>
        @endauth
     </div>

     <table class="table table-bordered">
       <thead>
          <tr>
            <th scope="col" colspan="3">Post</th>
          </tr>
        </thead>
            @foreach ($posts as $post)
            <tbody>
              <tr class="table table-bordered">
              <td><a href="{{ route('post.showcard', $post->id) }}">{{ $post->title }}</a></td>
              <td><a href="{{ route('post.edit', $post->id) }}" class="btn text-primary">Edit</a></td>
              <td>
                <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete this post?')">
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

@endsection