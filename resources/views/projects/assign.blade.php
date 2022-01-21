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

    <div class="col-md-9">
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1>
          Add user to: {{ $project->name }}
        </h1>
     </div>
         
     <div class="card col-md-12 mx-auto">
        <div class="card-body">
          <p class="card-title">Select a user:</p>
     <form method="post" action="{{route('projects.assign', ['project' => $project])}}">
        @method('POST')
        @csrf
     <div class="form-group row">
       <div class="col-sm-10">
         <select class="js-example-basic-single" style="width: 90%" name="user">
            @foreach($users as $user) 
              <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
         </select>
         <br><br>
          <p class="card-title">Select a role:</p>
         <select class="js-example-basic-single" style="width: 90%" name="role">
            <option value="Member">Member</option>
            <option value="Leader">Leader</option>
         </select>
        </div>
      </div>
      <button class="btn btn-primary float-md-end">Assign user</button>
         <a href="/projects" class="btn btn-link float-md-end mr-1">Cancel</a>
     </form>    
  
    <script>
      $(document).ready(function() {
        $('.js-example-basic-single').select2();
      });
    </script>

 </div>
@endsection