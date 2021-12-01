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
      <h1 class="card-title">Add user</h1> 
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Username</th>
              <th scope="col">Role</th>
              <th scope="col"></th>
            </tr>
          </thead>
          @foreach ($users as $user)
          <tbody>
            <tr class="table table-bordered">
              <td><a>{{ $user->name }}</a></td>
              <td><a>User</a></td>
              <td>
                <form method="post" action="{{route('projects.assign', ['project' => $project, 'user' => $user])}}">
                  @method('POST')
                  @csrf
                  <button class="btn text-primary">Assign</button>
                </form>
              </td> 
            </tr>
          @endforeach
       </tbody>
      </table>
     <a href="{{ route('projects.edit', $project->id) }}" class="float-end">Back</a> 
   </div>
   
   @if(session()->has('message'))
    <div style="position: absolute; padding: 5px; width: 390px;">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
   @endif

 </div>
@endsection