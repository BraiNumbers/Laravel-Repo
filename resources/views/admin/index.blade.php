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
           User section
        </h1>
           <a class="btn btn-primary col-md- float-md-end" href="#" role="button">Create user</a>
       </div>

     <table class="table table-bordered">
       <thead>
          <tr>
            <th scope="col" colspan="2">User</th>
          </tr>
        </thead>
            @foreach ($users as $user)
            <tbody>
              <tr class="table table-bordered">
              <td><a data-toggle="modal" data-target="#modal-{{$user->id}}" role="button" class="text-primary" href="{{ route('profile.update',  $user->id) }}">{{ $user->name }}</a></td>
                <td>
                  <form action="{{route('admin.destroyUser', ['id' => $user->id]) }}" method="post" onclick="return confirm('Are you sure you want to delete this user?')">
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

      @foreach ($users as $user)
        <div class="modal fade" id="modal-{{$user->id}}" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                <form action="{{route('profile.update', $user)}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @method('PUT')
                      @csrf
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" name="name" rows="1" value="{{ old('name', $user->name) }}" required> 
                              @error('name') 
                              <small class='text-danger'>{{$message}}</small>
                              @enderror   
                            </div>
                          </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Email address</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" rows="1" value="{{ old('email', $user->email) }}" required> 
                          </div>
                        </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="city" name="city" rows="1" value="{{ old('city', $user->city) }}" required>
                        @error('city') 
                          <small class='text-danger'>{{$message}}</small>
                        @enderror  
                      </div>
                    </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Profile image</label>
                      <div class="col-sm-10">
                       <input type="file" class="form-control" name="profile_image">
                         <img src="{{ asset($user->profile_image) }}" width="100px">
                        @error('profile_image') 
                          <small class='text-danger'>{{$message}}</small>
                        @enderror  
                     </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary float-md-end">Update profile</button>
                  </div>
                </form>  
              </div>
            </div>  
          </div>    
        </div> 
      @endforeach

@endsection