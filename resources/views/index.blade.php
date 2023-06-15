@extends('layouts.site')

@section('style')
    style="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;"
@endsection
@section('content')
    <div class="container text-center">
        <h2 class="mb-2">My base camp</h2>
        <a class="btn btn-primary mx-1" href="{{ route('login') }}">Login</a>
        <a class="btn btn-primary mx-1" href="{{ route('register') }}">Sign up</a>
    </div>
@endsection
