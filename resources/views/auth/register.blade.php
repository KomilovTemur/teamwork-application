@extends('layouts.site')
@section('style')
    style="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;"
@endsection
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>Sign Up</h3>
        <input class="form-control mb-2" type="text" required name="name" placeholder="Name" value="{{ old('name') }}" />
        @error('name')
            <div class="alert alert-danger mb-0 mt-2">
                {{ $message }}
            </div>
        @enderror
        <input class="form-control" type="email" required name="email" placeholder="Email" value="{{ old('email') }}" />
        @error('email')
            <div class="alert alert-danger mb-0 mt-2">
                {{ $message }}
            </div>
        @enderror
        <input class="form-control mt-2" type="password" name="password" placeholder="password" />
        @error('password')
            <div class="alert alert-danger mb-0 mt-2">
                {{ $message }}
            </div>
        @enderror

        <input class="form-control mt-2" type="password" name="password_confirmation" placeholder="Confirm Password" />
        @error('password_confirmation')
            <div class="alert alert-danger mb-0 mt-2">
                {{ $message }}
            </div>
        @enderror

        <div class="text-center">
            <button class="w-100 my-1 btn btn-primary" type="submit">
                sign up
            </button>
            <a href="{{ route('login') }}" class="text-decoration-none">
                Already you have account
            </a>
        </div>
    </form>
@endsection
