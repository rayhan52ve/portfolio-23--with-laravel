@extends('Admin.partials.master')
@section('content')

<div class="container" style="margin-top: 80px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="overflow:auto">
            @if(session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Good News!!</strong>{{ session('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Good News!!</strong>{{ session('update') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header">
                    <h3>Portfolio Info</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Project</th>
                                <th scope="col">Email</th>
                                <th scope="col">Number</th>
                                <th scope="col">Facebook</th>
                                <th scope="col">Twitter</th>
                                <th scope="col">Github</th>
                                <th scope="col">Youtube</th>
                                <th scope="col">Image Title</th>
                                <th scope="col">Language</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sl=1
                            @endphp
                        @foreach ($portfolios as $portfolio)
                            <tr>
                                <td scope="row">{{$sl++}}</td>
                                <td>{{$portfolio->title}}</td>
                                <td class="des">{{$portfolio->description}}</td>
                                <td>{{$portfolio->project}}</td>
                                <td>{{$portfolio->email}}</td>
                                <td>{{$portfolio->call}}</td>
                                <td>{{$portfolio->facebook}}</td>
                                <td>{{$portfolio->twitter}}</td>
                                <td>{{$portfolio->github}}</td>
                                <td>{{$portfolio->youtube}}</td>
                                <td>{{$portfolio->img_title}}</td>
                                <td>{{$portfolio->language}}</td>
                                <td>{{$portfolio->image}}</td>
                                <td>
                                    <a href="{{route('portfolios.edit',$portfolio)}}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                                       
                                        <form action="{{route('portfolios.destroy', $portfolio)}}" method="post">
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