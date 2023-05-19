@extends('Admin.partials.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2" style="margin-top: 50px">
            <div class="card">
            @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Good News!!</strong>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <div class="card-header">
                    <h3>Add Portfolio</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   
                    <form action="{{route('portfolios.store')}}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title">

                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Description"></textarea>

                            <label for="project">Project</label>
                            <input type="text" class="form-control" name="project" placeholder="Enter Your Project">

                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email">

                            <label for="call">Call</label>
                            <input type="number" class="form-control" name="call" placeholder="Enter Your Number">

                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" name="facebook" placeholder="Enter Your Facebook">

                            <label for="twitter">twitter</label>
                            <input type="text" class="form-control" name="twitter" placeholder="Enter Your Twitter">

                            <label for="github">Github</label>
                            <input type="text" class="form-control" name="github" placeholder="Enter Your Github">

                            <label for="youtube">Youtube</label>
                            <input type="text" class="form-control" name="youtube" placeholder="Enter Your Youtube">

                            <label for="img_title">Image Title</label>
                            <input type="text" class="form-control" name="img_title" placeholder="Enter Image Title">

                            <label for="language">Language</label>
                            <input type="text" class="form-control" name="language" placeholder="Enter Language">

                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image">

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection