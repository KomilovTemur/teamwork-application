@extends('layouts.site')
@section('style')
    style="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;"
@endsection
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h3>Login</h3>
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
        <div class="text-center">
            <label for="showpwd" class="mt-2">Show password
                <input type="checkbox" name="" id="showpwd">
            </label>
            <button class="btn btn-primary w-100 my-2" type="submit">Login</button>

            <br>
            <a class="text-decoration-none" href="{{ route('register') }}">
                You don't have accound! sign up
            </a>
        </div>
    </form>
    <script>
        let showpwd = document.querySelector("#showpwd")
        let password = document.querySelector('input[name=password]')
        showpwd.addEventListener('click', () => {
            let type = password.getAttribute('type')
            if (showpwd.checked) {
                if (type == 'password') {
                    password.setAttribute('type', 'text')
                } else {
                    password.setAttribute('type', 'password')
                }
            } else {
                if (type == 'password') {
                    password.setAttribute('type', 'text')
                } else {
                    password.setAttribute('type', 'password')
                }
            }
        })
    </script>
@endsection
