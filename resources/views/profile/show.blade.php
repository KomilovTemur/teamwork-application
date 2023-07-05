@extends('layouts.site')
@section('user')
  {{ $user->email }}
@endsection
@section('content')
  @include('layouts.navbar')

  <div class="container" style="margin-top: 80px">

    <div class="row">
      @foreach ($user->projects as $project)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card my-1" style="min-height: 225px">
            <div class="cart-header rounded p-2 bg-dark text-light">
              <div class="d-flex align-items-center justify-content-between">
                {{ \Str::limit($project->name, 20) }}
                <a class="text-decoration-none text-light" href="{{ route('projects.edit', $project->id) }}"><i
                    class="fa-solid fa-eye"></i></a>
              </div>
              @if (count($project->user) > 1)
                <i class="fa-solid fa-users"></i>
                @foreach ($project->user as $user)
                  @if ($loop->index < 3)
                    {{ \Str::limit($user->name, 5) }}
                  @endif
                @endforeach
              @else
                <i class="fa-solid fa-pen"></i>
                {{ $project->user[0]->name }}
              @endif
            </div>
            <div class="card-body">
              {!! \Str::limit($project->description, 50) !!}
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="btn btn-warning w-100" href="{{ route('comments.show', $project->id) }}"><i
                  class="fa-solid fa-comment"></i> {{ count($project->comments) }}
                comment{{ count($project->comments) > 1 ? 's' : '' }}</a>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
@endsection
