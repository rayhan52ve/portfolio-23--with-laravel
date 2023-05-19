@extends('Admin.partials.master')

@section('content')
<div class="container" style="margin-top:80px">
  <div class="row ">
       <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3>User Info</h3>
            </div>
            <div class="card-body">
              @if(session()->has('msg'))
                    <div class="alert alert-{{session('cls')}}">
                      {{session('msg')}}
                    </div>
              @endif
              <table class="table table-sm">
                <tbody>
                  <tr class="pb-6">
                    <td><img src="{{ asset(Auth::user()->image) }}" width="100px" height="100px" class="thumbnail"></td>
                  </tr>
                  <tr>
                    <th scope="col">Name</th>
                    <td><b>{{Auth::user()->name}}<b></td>
                  </tr>
                  <tr>
                    <th scope="col">Description</th>
                    <td>{{Auth::user()->description}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Email</th>
                    <td>{{Auth::user()->email}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Phone</th>
                    <td>{{Auth::user()->phone}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Designation</th>
                    <td>{{Auth::user()->designation}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Address</th>
                    <td>{{Auth::user()->address}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Age</th>
                    <td>{{Auth::user()->age}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Nationality</th>
                    <td>{{Auth::user()->nationality}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Languages</th>
                    <td>{{Auth::user()->languages}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Freelance</th>
                    <td>{{Auth::user()->freelance}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Skype</th>
                    <td>{{Auth::user()->skype}}</td>
                  </tr>
                  <tr>
                    <th scope="col">Project Completed</th>
                    <td>{{Auth::user()->complete_project}}</td>
                  </tr>
              </table> 
              <a class="btn btn-info " href="{{route('profile_edit',$user->id)}}">Edit</a>            
             </div>
        </div>
     </div>
     </div>
  </div>
    
@endsection

