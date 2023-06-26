@extends('layouts.site')
@section('user')
    Basecamp
@endsection
@section('style')
    style="display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;"
@endsection
@section('content')
    <form action="{{ route('projects.store') }}" method="post"
        style="
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;">
        <h2 class="h2">New Project</h2>
        @csrf
        <label>
            Name
            <input type="text" name="name" value="{{ old('name') }}" class="form-control w-100" required="">
        </label>
        @error('name')
            <div class="alert alert-danger">{{ $error }}</div>
        @enderror
        <label>
            Description
            <textarea name="description" cols="50" required="" rows="5" class="form-control"
                value="{{ old('description') }}"></textarea>
        </label>
        @error('description')
            <div class="alert alert-danger">{{ $error }}</div>
        @enderror
        <button class="btn btn-primary mt-2" type="submit">
            Add new project
        </button>
    </form>
@endsection
