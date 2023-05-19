@extends('Admin.partials.master')

@section('content')
<div class="container" style="margin-top:80px">
  <div class="row ">
       <div class="col-md-6 offset-2">
        <div class="card">
            <div class="card-header">
                <h3>Edit User Info</h3>
            </div>
            <div class="card-body">
                <form action="{{route('profile_update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT') 
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="">Name</label>
                        <input value="{{Auth::user()->name}}" type="text" class="form-control" Name="name" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Description</label>
                        <textarea class="form-control" Name="description" rows="3" >{{Auth::user()->description}}</textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input value="{{Auth::user()->email}}" type="email" class="form-control" Name="email">
                      </div>
                      
                      <div class="form-group col-md-6">
                        <label for="">Phone</label>
                        <input value="{{Auth::user()->phone}}" type="text" class="form-control"  Name="phone">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Designation</label>
                        <input value="{{Auth::user()->designation}}" type="text" class="form-control" Name="designation">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Address</label>
                        <input value="{{Auth::user()->address}}" type="text" class="form-control"  Name="address">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Age</label>
                        <input value="{{Auth::user()->age}}" type="text" class="form-control"  Name="age">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Nationality</label>
                        <input value="{{Auth::user()->nationality}}" type="text" class="form-control"  Name="nationality">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Languages</label>
                        <input value="{{Auth::user()->languages}}" type="text" class="form-control"  Name="languages">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Freelance</label>
                        <input value="{{Auth::user()->freelance}}" type="text" class="form-control"  Name="freelance">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Skype</label>
                        <input value="{{Auth::user()->skype}}" type="text" class="form-control"  Name="skype">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Completed Projects</label>
                        <input value="{{Auth::user()->complete_project}}" type="text" class="form-control"  Name="complete_project">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Photo</label>
                        <input type="file" class="form-control" value="{{asset(Auth::user()->image)}}" name="image">
                      </div>
                      
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
     </div>
     </div>
  </div>
    
@endsection

