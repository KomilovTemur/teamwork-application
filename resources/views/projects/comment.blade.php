@extends('layouts.site')
@section('user')
  Comments
@endsection
@section('content')
  @include('layouts.navbar')
  <div class="container w-50" style="margin-top: 80px">
    <form action="{{ route('comments.store') }}" method="post" class="d-flex">
      @csrf
      <input type="text" name="comment" required class="form-control" style="margin-right: 5px;"
        placeholder="Add your comment" />
      <input type="hidden" name="project_id" value="{{ $project->id }}" />
      <button class="btn btn-primary">add</button>
    </form>
    @if ($message = Session::get('success'))
      <div class="alert alert-success mt-2">{{ $message }}</div>
    @endif
    @if ($message = Session::get('info'))
      <div class="alert alert-info my-2">{{ $message }}</div>
    @endif

    <div class="row">
      @foreach ($comments as $comment)
        <div class="col-md-12 mt-2">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
              <div class="m-0">
                @if ($comment->user->id == auth()->id())
                  <a class="text-dark text-decoration-none"
                    href="{{ route('dashboard') }}">{{ $comment->user->name }}</a>
                @else
                  <a class="text-dark text-decoration-none"
                    href="{{ route('user', $comment->user->id) }}">{{ $comment->user->name }}</a>
                @endif
              </div>

              @if ($comment->user->id == auth()->id())
                <form action="{{ route('comments.destroy', $comment->id) }}" method="post" class="btn-group"
                  role="group">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-warning" data-bs-toggle="collapse"
                    data-bs-target="#{{ $comment->user->email . $comment->id }}" aria-expanded="false"
                    aria-controls="{{ $comment->user->email . $comment->id }}">
                    <i class="fas fa-pen"></i>
                  </button>
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
              @else
                {{ $comment->created_at }}
              @endif

            </div>
            <div class="card-body">
              <p class="m-0">{{ $comment->comment }}</p>
            </div>
            @if ($comment->user->id == auth()->id())
              <div class="collapse" id="{{ $comment->user->email . $comment->id }}">
                <div class="card-footer">
                  <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <p class="mb-0">Update comment</p>
                    <div class="input-group">
                      <input type="text" class="form-control" name="comment" value="{{ $comment->comment }}">
                      <button type="button" class="btn btn-warning" data-bs-toggle="collapse"
                        data-bs-target="#{{ $comment->user->email . $comment->id }}" aria-expanded="false"
                        aria-controls="{{ $comment->user->email . $comment->id }}">
                        <i class="fas fa-close"></i>
                      </button>
                      <button id="submit-button" class="btn btn-success">
                        <i class="fa-solid my-1 fa-cloud-upload"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            @endif

          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
@section('script')
  <script src="/assets/js/bootstrap.min.js"></script>
@endsection
