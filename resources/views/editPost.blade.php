@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="/storeEdit/{{$blog->id}}" method="POST" class="m-10">
            @csrf
            <div class="form-group">
                <textarea class="form-control" rows="3" name="content">{{$blog->content}}</textarea>
            </div>
            <div class="text-right">
                <button class="create-post btn btn-primary" type="submit">Post</button>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection