@extends('layouts.site')
@section('user')
  Basecamp
@endsection
@section('css')
  <link rel="stylesheet" href="/assets/css/file-icons.css">
@endsection
@section('content')
  {{-- @include('layouts.navbar') --}}

  <nav class="navbar px-5 sticky-top bg-body-tertiary navbar-expand-lg bg-body-tertiary">

    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('projects.show', $project->id) }}"><i class="fas fa-code"></i> Project</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-bug"></i> Issues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-users"></i> Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-play-circle"></i> Actions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('projects.edit', $project->id) }}"><i class="fas fa-gear"></i> Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
      </div>
      <span class="navbar-text">
        <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
      </span>
    </div>
  </nav>
  <div class="container">
    @foreach ($project->attachments as $attachment)
      <div class="card mb-3" style="max-width: 540px;">
        <div class="d-flex align-items-center justify-content-start">
          @if ($attachment->extension == 'jpg')
            <img src="{{ asset('attachments/' . $attachment->file) }}" type="image" class="img-fluid rounded-start"
              alt={{ $attachment->file }}>
          @else
            <div class="fi fi-{{ $attachment->extension }}">
              <div class="fi-content">{{ $attachment->extension }}</div>
            </div>
          @endif
          <div class="card-body">
            <h5 class="card-title"> {{ $attachment->name }}</h5>
            {{$attachment->user->email}}
          </div>
        </div>
      </div>
    @endforeach
    @if ($message = Session::get('error'))
      <div class="alert alert-danger">{{ $message }}</div>
    @endif
    @if ($message = Session::get('success'))
      <div class="alert alert-success">{{ $message }}</div>
    @endif
    <div class="row">
      <form method="POST" action="{{ route('attachments.store') }}" enctype="multipart/form-data">
        @csrf
        <h2>Upload file</h2>
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        @error('file')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="file" class="form-control" name="file" id="">
        <button class="btn btn-primary mt-2" type="submit">Submit</button>
      </form>
    </div>
  </div>
@endsection
@section('script')
  <script src="/assets/js/bootstrap.min.js"></script>
  {{-- <script src="/assets/js/file-icons.js"></script> --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
  <script>
    // ClassicEditor
    //   .create(document.querySelector('.ckeditor'))
    //   .catch(error => {
    //     console.error(error);
    //   });
  </script>
@endsection
