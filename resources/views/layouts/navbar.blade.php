<nav class="bg-light d-flex align-items-center justify-content-between">
  <div class="logo">
    <h2><a class="text-dark text-decoration-none" href="{{route('dashboard')}}">@yield('user')</a></h2>


  </div>
  <ul class="nav-links m-0 d-flex align-items-center justify-content-between">
    <li>
      <a class="btn btn-success text-light" href="{{ route('projects.create') }}"><i class="fa-solid px-2 fa-circle-plus"></i></a>
    </li>
    <li>
      <a class="btn btn-dark text-light" href="{{route("profile.edit")}}"><i class="fa-solid fa-user-pen px-2"></i></a>
    </li>
    <li>
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn btn-danger text-light">
          Logout
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </button>
      </form>
    </li>
  </ul>
</nav>
