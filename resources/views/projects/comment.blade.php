@extends('layouts.site')
@section('user')
Comments
@endsection
@section('content')
@include('layouts.navbar')
<div class="container w-50" style="margin-top: 80px">
  <form action="{{route('comments.store')}}" method="post" class="d-flex">
    @csrf
    <input type="text" name="comment" class="form-control" style="margin-right: 5px;" placeholder="Add your comment" />
    <input type="hidden" name="project_id" value="{{$project->id}}" />
    <button class="btn btn-primary">add</button>
  </form>
  <div class="row">
    {{-- {{$comments}} --}}
    @foreach ($comments as $comment)
    <div class="col-md-12 mt-2">
      <div class="card">
        <div class="card-header">
          <p class="m-0">{{ $comment->user->name }}</p>
        </div>
        <div class="card-body">
          <p class="m-0">{{ $comment->comment }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
