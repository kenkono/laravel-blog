@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="/user/storeEdit/{{$user->id}}" method="POST" class="m-10">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}">
            </div>   
            <div class="form-group">
                <label for="exampleInputEmail1">Current Password</label>
                <input type="password" class="form-control" name="current_password">
            </div> 

            <div class="form-group">
                <label for="exampleInputEmail1">New Password</label>
                <input type="password" class="form-control" name="password">
            </div> 
            
            <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirm">
            </div> 
            <div class="text-right">
                <button class="create-post btn btn-primary mt-3" type="submit">Edit</button>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection