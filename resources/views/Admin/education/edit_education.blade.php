@extends('Admin.partials.master')

@section('content')
  <div class="container" style="margin-top:80px">
     <div class="row ">
        <div class="col-md-6 offset-3 ">
        <div class="card">
            <div class="card-header">
                <h3>Edit Education Info</h3>
            </div>
            <div class="card-body">
              @if($errors->any())
               <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
                </ul>
               </div>
              @endif
                <form action="{{route('educations.update',$education->id)}}" method="post">
                    @method('PUT') 
                    @csrf
                    <div class="form-group">
                      <label for="title">Degree</label>
                      <input type="text" value="{{$education->title}}" name="title" class="form-control" id="" placeholder="Enter Degree">
                      <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="sector">Institute</label>
                      <input type="text" value="{{$education->sector}}" name="sector" class="form-control" id="" placeholder="Institute">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea type="text" value="" name="description" class="form-control" id=""  rows="3">{{$education->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="time">Year</label>
                      <input type="text" value="{{$education->time}}" name="time" class="form-control" id="" placeholder="Education year">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
             </div>
        </div>
     </div>
  </div>
</div>
    
@endsection

