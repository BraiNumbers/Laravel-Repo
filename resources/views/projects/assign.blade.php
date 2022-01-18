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
         
     <div class="card col-md-9 mx-auto">
        <div class="card-body">
          <h1 class="card-title">Add user</h1>
          <p class="card-title">Select a user:</p>
     <form method="post" action="{{route('projects.assign', ['project' => $project])}}">
        @method('POST')
        @csrf
     <div class="form-group row">
       <div class="col-sm-10">
         <select class="js-example-basic-single" style="width: 100%" name="user">
            @foreach($users as $user) 
              <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
         </select>
          <p class="card-title">Select a role:</p>
         <select class="js-example-basic-single" style="width: 100%" name="role">
          <option value="Member">Member</option>
          <option value="Leader">Leader</option>
         </select>
        </div>
      </div>
      <button class="btn btn-primary float-md-end">Assign</button>
         <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-link float-md-end mr-1">Back</a>
     </form>    
  
    @if(session()->has('message'))
      <div style="position: absolute; padding: 5px; width: 390px;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif

    <script>
      $(document).ready(function() {
        $('.js-example-basic-single').select2();
      });
    </script>

 </div>
@endsection