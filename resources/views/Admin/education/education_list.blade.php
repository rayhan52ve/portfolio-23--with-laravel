@extends('Admin.partials.master')

@section('content')
<div class="container" style="margin-top:80px">
  <div class="row ">
       <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3>Education Info</h3>
            </div>
            <div class="card-body">
              @if(session()->has('msg'))
                    <div class="alert alert-{{session('cls')}}">
                      {{session('msg')}}
                    </div>
              @endif
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Degree</th>
                        <th scope="col">Institute</th>
                        <th scope="col">Year</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="w-25 p-3">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $sl=1
                      @endphp
                      @foreach ($educations as $edu)
                      <tr>
                        <th scope="row">{{$sl++}}</th>
                        <td>{{$edu->title}}</td>
                        <td>{{$edu->sector}}</td>
                        <td>{{$edu->time}}</td>
                        <td>{{$edu->description}}</td>
                        <td>
                          <a type="button" href="{{route('educations.edit',$edu)}}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                          <form action="{{ route('educations.destroy', $edu)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                          </form>
                        </td>

                      </tr>
                      @endforeach  
                    </tbody>
                  </table>
             </div>
        </div>
     </div>
     </div>
  </div>
    
@endsection

