@extends('layouts.site')
@section('user')
  Collabration App
@endsection
@section('css')
  <link rel="stylesheet" href="/assets/css/file-icons.css" />
@endsection
@section('viewers')
  {{ count($project->viewer) }}
@endsection
@section('content')
  @include('layouts.project-nav')

  <div class="container">
    @foreach ($project->attachments as $attachment)
      <div class="card mb-3" style="max-width: 540px;">
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-center justify-content-start">
            @php
              $img_extensions = ['png', 'jpeg', 'jpg', 'svg', 'gif'];
            @endphp
            @if (in_array($attachment->extension, $img_extensions))
              <img src="{{ route('attachments.show', $attachment->id) }}" alt="{{ $attachment->name }}"
                style="width: 150px" />
            @else
              <div class="p-5">
                <div class="fi fi-{{ $attachment->extension }}">
                  <div class="fi-content">{{ $attachment->extension }}</div>
                </div>
              </div>
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">
                <i class="fas fa-file"></i> {{ \Str::limit($attachment->name, 20) }}
              </h5>
              <p class="mb-2">
                <i class="fas fa-user"></i> {{ $attachment->user->email }}
              </p>
              <a href="{{ route('attachments.show', $attachment->id) }}" class="btn btn-success">
                <i class="fas fa-cloud-download"></i>
                download
              </a>
            </div>
          </div>
          @if ($attachment->user->id == auth()->id())
            <div class="p-3">
              <form action="{{ route('attachments.destroy', $attachment->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-secondary" type="submit">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          @endif
        </div>
      </div>
    @endforeach
    @if ($message = Session::get('error'))
      <div class="alert alert-danger">{{ $message }}</div>
    @endif
    @if ($message = Session::get('success'))
      <div class="alert alert-success">{{ $message }}</div>
    @endif
    @if ($message = Session::get('success-delete'))
      <div class="alert alert-success">{{ $message }}</div>
    @endif
    @foreach ($project->user as $member)
      @if ($member->id == auth()->id())
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
      @else
      @endif
    @endforeach

  </div>
@endsection
@section('script')
  <script src="/assets/js/bootstrap.min.js"></script>
  {{-- <script src="/assets/js/file-icons.js"></script> --}}
  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script> --}}
  <script>
    // ClassicEditor
    //   .create(document.querySelector('.ckeditor'))
    //   .catch(error => {
    //     console.error(error);
    //   });
  </script>
@endsection
