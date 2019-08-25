@extends('layouts.app')

@section('content')

<!--　▼ ジャンボトロン　 -->
<div class="jumbotron">
    <div class="container">

    </div>
</div>
<!--　▲ ジャンボトロン　 -->

<h1 class="text-center p-3">Awesome Blog App</h1>
<h3 class="text-center">Welcome</h3>

<div class="text-center">
    <a href="{{ route('home') }}" class="btn btn-primary">Go to dashbord</a>
</div>
@endsection