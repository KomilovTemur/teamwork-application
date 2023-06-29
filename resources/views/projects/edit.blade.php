@extends('layouts.site')
@section('user')
    Basecamp
@endsection
@section('content')
    {{-- @include('layouts.navbar') --}}
    <div class="container">
        <h2 class="mt-5">Project Settings</h2>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('projects.update', $project->id) }}" method="post" class="d-flex w-100 flex-column">
                    @method('PATCH')
                    @csrf
                    <label>
                        Name
                        <input class="form-control mb-2" type="text" value="{{ $project->name }}" name="name"
                            id="">
                    </label>
                    <label>
                        Description
                        <textarea class="form-control mb-2" type="text" value="" name="description" id="" cols="30"
                            rows="5">{{ $project->description }}</textarea>
                    </label>
                    <div class="d-flex">
                        <button class="btn btn-success mb-2 w-50 me-1" type="submit">
                            <i class="fa-solid my-1 fa-cloud-upload"></i>
                            Update
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-2 ms-1 w-50">
                            <i class="fa-solid my-1 fa-arrow-left"></i>
                            Go back
                        </a>
                    </div>
                </form>

                @if ($project->user[0]->id == auth()->id())
                    <form action="/project/addMember" method="post" class="mt-3">
                        <input type="text" name="projectId" hidden="" value="52">
                        <input required="" type="text" name="username" placeholder="Add Member (username)"
                            class="form-control mb-2">
                        <button type="submit" class="btn btn-dark">
                            Add member
                            <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </form>
                @endif

            </div>
            <div class="col-md-4">
                <a href="/project/projectOverview/52" class="btn btn-warning w-100 mb-2">
                    <i class="fa-solid my-1 fa-eye"></i>
                    Project overview
                </a>
                <a href="/project/deleteProject/52" class="btn btn-danger w-100">
                    Delete Project
                    <i class="fa-solid my-1 fa-trash"></i>
                </a>

                <h3 class="mt-2 text-center">Members</h3>
                <ul class="list-group mt-2">
                    @foreach ($project->user as $member)
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            {{ $member->name }}
                            @if ($project->user[0]->id != $project->user[$loop->index]->id)
                                @if ($project->user[0]->id == auth()->id())
                                    <form action="#">
                                        <button type="submit" class="btn btn-danger">remove</button>
                                    </form>
                                @endif
                                @if ($member->id == auth()->id())
                                    <form action="#">
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
