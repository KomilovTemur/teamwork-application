@extends('layouts.site')
@section('user')
Basecamp
@endsection
@section('content')
{{-- @include('layouts.navbar') --}}

<nav class="navbar px-5 sticky-top bg-body-tertiary navbar-expand-lg bg-body-tertiary">

  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('projects.show', $project->id)}}"><i class="fas fa-code"></i> Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-book"></i> Issues</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-users"></i> Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-play-circle"></i> Actions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-gear"></i> Settings</a>

        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">

  <div class="row">


  </div>
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<script>
  // ClassicEditor
  //   .create(document.querySelector('.ckeditor'))
  //   .catch(error => {
  //     console.error(error);
  //   });

</script>
@endsection
