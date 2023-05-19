

@extends('Admin.partials.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Welcome!!  {{Auth::user()->name}}</h4>
                <p>Nothing can bring us more pleasure than giving you the service you deserve! Welcome to our place, and we are grateful for your stay with us!</p>
                <hr>
                <p class="mb-0">Very much grateful to have you with us!!!</p>
              </div>
        </div>
    </div>
</div>
@endsection