@extends('layouts.site')
@section('user')
    Collabration App
@endsection
@section('css')
    <link rel="stylesheet" href="/assets/css/file-icons.css">
@endsection
@section('content')
    @include('layouts.project-nav')

    <div class="container">
        @foreach ($project->attachments as $attachment)
        <img src="{{asset('/attachments/'.$attachment->file)}}" alt="file">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="d-flex align-items-center justify-content-start">

                    <div class="fi fi-{{ $attachment->extension }}">
                        <div class="fi-content">{{ $attachment->extension }}</div>
                    </div>
                   
                    <div class="card-body">
                        <h5 class="card-title"> {{ $attachment->name }}</h5>
                        {{ $attachment->user->email }}
                        <br>
                        <a href="/attachments/{{ $attachment->file }}" download="">download</a>
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
