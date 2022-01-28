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
           Create user
        </h1>
      </div>

      <div class="card col-md-12 mx-auto">
       <div class="card-body">
        <br>
        <form action="{{route('admin.store')}}" method="post" class="needs-validation" novalidate>
          @method('POST')
            @csrf
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" id="name" name="name" rows="1" required> 
                    @error('name') 
                     <small class='text-danger'>{{$message}}</small>
                    @enderror   
                  </div>
                </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email address</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" id="email" name="email" rows="1" required> 
                   @error('email') 
                    <small class='text-danger'>{{$message}}</small>
                   @enderror  
                </div>
              </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" id="city" name="city" rows="1" required>
                   @error('city') 
                    <small class='text-danger'>{{$message}}</small>
                   @enderror  
                </div>
              </div>
               <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                 <div class="col-sm-10">
                 <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                   @error('password') 
                    <small class='text-danger'>{{$message}}</small>
                   @enderror 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Confirm password</label>
                 <div class="col-sm-10">
                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>
            <button type="submit" class="btn btn-primary float-md-end">Create user</button>
          <a href="{{ route('admin.index') }}" class="btn btn-link float-md-end mr-1">Cancel</a>
       </form>

@endsection