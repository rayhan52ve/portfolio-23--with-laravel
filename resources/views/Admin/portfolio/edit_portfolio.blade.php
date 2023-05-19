@extends('Admin.partials.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2" style="margin-top: 50px">
            <div class="card">

                <div class="card-header">
                    <h3>Update Portfolio</h3>
                </div>
                <div class="card-body">
                   
                    <form action="{{route('portfolios.update', $portfolio->id)}}" method="post" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$portfolio->title}}">

                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{$portfolio->description}}</textarea>

                            <label for="project">Project</label>
                            <input type="text" class="form-control" name="project" value="{{$portfolio->project}}">

                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$portfolio->email}}">

                            <label for="call">Call</label>
                            <input type="number" class="form-control" name="call" value="{{$portfolio->call}}">

                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" name="facebook"  value="{{$portfolio->facebook}}">

                            <label for="twitter">twitter</label>
                            <input type="text" class="form-control" name="twitter" value="{{$portfolio->twitter}}">

                            <label for="github">Github</label>
                            <input type="text" class="form-control" name="github"  value="{{$portfolio->github}}">

                            <label for="youtube">Youtube</label>
                            <input type="text" class="form-control" name="youtube"  value="{{$portfolio->youtube}}">

                            <label for="img_title">Image Title</label>
                            <input type="text" class="form-control" name="img_title" placeholder="Enter Image Title" value="{{$portfolio->img_title}}">

                            <label for="language">Language</label>
                            <input type="text" class="form-control" name="language" placeholder="Enter Language" value="{{$portfolio->language}}">

                            <label for="image">Image</label>
                            <input type="file" class="form-control " name="image" value="{{$portfolio->image}}">

                            <button type="submit" class="btn btn-primary mt-3">Update</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection