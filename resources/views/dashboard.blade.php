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
                        <div class="card my-1">
                            <div class="cart-header rounded p-2 bg-dark text-light">
                                <div class="d-flex align-items-center justify-content-between">
                                    {{ $project->name }}
                                    <a class="text-decoration-none text-light"
                                        href="{{ route('projects.edit', $project->id) }}"><i
                                            class="fa-solid fa-gear"></i></a>
                                </div>
                                @if (count($project->user) > 1)
                                    <i class="fa-solid fa-users"></i>
                                    @foreach ($project->user as $user)
                                        {{ $loop->iteration . ": " . \Str::limit($user->name, 5) }}
                                        
                                    @endforeach
                                @else
                                    <i class="fa-solid fa-pen"></i>
                                    {{ $project->user[0]->name }}
                                @endif
                                {{-- {{ $project->user->name }} --}}
                            </div>
                            <div class="card-body">
                                <p>{{ $project->description }}</p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="btn btn-warning" href="/comments/48"><i class="fa-solid fa-comment"></i></a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger delete"
                                        onclick="return confirm('Are you delete this project?')" type="submit"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
