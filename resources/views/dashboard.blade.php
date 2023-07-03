@extends('layouts.site')
@section('user')
Basecamp
@endsection
@section('content')
@include('layouts.navbar')
<div class="container mt-5">
  <div class="row">
    <h2 class="text-center mt-5 mb-3">Projects</h2>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">{{ $message }}</div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">{{ $message }}</div>
    @endif
    @if (count($projects) == 0)
    <div class="alert alert-danger text-center">There are no projects</div>
    @else
    @foreach ($projects as $project)
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="card my-1" style="min-height: 225px">
        <div class="cart-header rounded p-2 bg-dark text-light">
          <div class="d-flex align-items-center justify-content-between">
            {{\Str::limit($project->name,20)}}
            <a class="text-decoration-none text-light" href="{{ route('projects.edit', $project->id) }}"><i class="fa-solid fa-gear"></i></a>
          </div>
          @if (count($project->user) > 1)
          <i class="fa-solid fa-users"></i>

          @foreach ($project->user as $user)
          @if ($loop->index < 3) {{ \Str::limit($user->name, 5) }} @endif @endforeach @else <i class="fa-solid fa-pen"></i>
            {{ $project->user[0]->name }}
            @endif
        </div>
        <div class="card-body">
          <p>{{\Str::limit($project->description, 50) }}
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          @if ($project->user[0]->id == auth()->id())
          <a class="btn btn-warning" href="{{route("comments.show", $project->id)}}">{{count($project->comments)}} <i class="fa-solid fa-comment"></i></a>
          <form action="{{ route('projects.destroy', $project->id) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger w-100" onclick="return confirm('Are you delete this project?')" type="submit">
              Delete
              <i class="fa-solid fa-trash"></i>
            </button>
          </form>

          @else
          <a class="btn btn-warning w-100" href="{{route("comments.show", $project->id)}}"><i class="fa-solid fa-comment"></i> {{count($project->comments)}} comment{{count($project->comments) > 1 ? "s": ""}}</a>
          @endif
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
</div>
@endsection
