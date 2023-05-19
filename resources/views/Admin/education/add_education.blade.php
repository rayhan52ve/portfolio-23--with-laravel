@extends('Admin.partials.master')

@section('content')
<div class="container" style="margin-top:80px">
  <div class="row ">
   <div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-header">
                <h3>Insert Education Info</h3>
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
                <form action="{{route('educations.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="title">Degree</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Enter Degree" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                      <label for="sector">Institute</label>
                      <input type="text" name="sector" class="form-control" id="" placeholder="Institute" value="{{ old('sector') }}">
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea type="text" name="description" class="form-control" id="" placeholder="Description" value="{{ old('description') }}" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="time">Year</label>
                      <input type="text" name="time" class="form-control" id="" placeholder="Education year" value="{{ old('time') }}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
             </div>
        </div>
     </div>
  </div>
</div>

    
@endsection

