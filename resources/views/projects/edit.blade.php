@extends('layouts.site')
@section('user')
    Basecamp
@endsection
@section('content')
    {{-- @include('layouts.navbar') --}}
    <div class="container">
        <div class="row">
            @if ($project->user[0]->id == auth()->id())
                <h2 class="mt-5">Project Settings</h2>
            @endif
            <div class="col-md-8">
                @if ($project->user[0]->id == auth()->id())
                    <form action="{{ route('projects.update', $project->id) }}" method="post"
                        class="d-flex w-100 flex-column">
                        @method('PATCH')
                        @csrf
                        <label>
                            Name
                            <input class="form-control mb-2" type="text" value="{{ $project->name }}" name="name"
                                id="">
                        </label>
                        <label>
                            Description
                            <textarea class="form-control ckeditor" type="text" value="" name="description" id=""
                                cols="30" rows="5">{{ $project->description }}</textarea>
                        </label>
                        <div class="d-flex mt-2">
                            <button class="btn btn-success w-50 me-1" type="submit">
                                <i class="fa-solid my-1 fa-cloud-upload"></i>
                                Update
                            </button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary ms-1 w-50">
                                <i class="fa-solid my-1 fa-arrow-left"></i>
                                Go back
                            </a>
                        </div>
                    </form>


                    <form action="{{ route('members.store') }}" method="post" class="mt-2">
                        @csrf
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">{{ $message }}</div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif

                        <input type="text" name="project_id" hidden="" value="{{ $project->id }}">

                        <input required="" type="email" name="email" placeholder="Add Member (with email)"
                            class="form-control mb-2">
                        <button type="submit" class="btn btn-dark mb-2">
                            Add member
                            <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </form>
                @else
                    <div class="card my-1">
                        <div class="cart-header border-bottom p-2 text-center">
                            <h3 class="mb-0">{{ $project->name }}</h3>
                        </div>
                        <div class="card-body">
                            <p class=""> {!! $project->description !!}</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="btn btn-warning w-100" href="{{ route('comments.show', $project->id) }}"><i
                                    class="fa-solid fa-comment"></i> {{ count($project->comments) }}
                                comment{{ count($project->comments) > 0 ? 's' : '' }}</a>
                        </div>
                    </div>
                @endif

            </div>
            <div class="col-md-4">
                @if (count($project->user) > 1)
                    @if ($project->user[0]->id == auth()->id())
                        <a href="/project/projectOverview/52" class="btn btn-warning w-100 mb-2">
                            <i class="fa-solid my-1 fa-eye"></i>
                            Project overview
                        </a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger w-100" onclick="return confirm('Are you delete this project?')"
                                type="submit">
                                Delete Project
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    @endif
                @else
                    @if ($project->user[0]->id == auth()->id())
                        <a href="/project/projectOverview/52" class="btn btn-warning w-100 mb-2">
                            <i class="fa-solid my-1 fa-eye"></i>
                            Project overview
                        </a>
                        <a href="/project/deleteProject/52" class="btn btn-danger w-100">
                            Delete Project
                            <i class="fa-solid my-1 fa-trash"></i>
                        </a>
                    @endif
                @endif

                <h3 class="mt-2 text-center">Members</h3>
                @if ($message = Session::get('removed'))
                    <div class="alert alert-info">{{ $message }}</div>
                @endif

                <ul class="list-group mt-2">
                    @foreach ($project->user as $member)
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            {{ $member->name }}
                            @if ($project->user[0]->id != $project->user[$loop->index]->id)
                                @if ($project->user[0]->id == auth()->id())
                                    <form action="{{ route('members.update', $project->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $member->id }}">
                                        <button type="submit" class="btn btn-danger">remove</button>
                                    </form>
                                @endif
                                @if ($member->id == auth()->id())
                                    <form action="{{ route('members.update', $project->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <button type="submit" class="btn btn-danger">Leave</button>
                                    </form>
                                @endif
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    <script>
        // ClassicEditor
        //     .create(document.querySelector('.ckeditor'))
        //     .catch(error => {
        //         console.error(error);
        //     });
    </script>
@endsection
