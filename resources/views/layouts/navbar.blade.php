<nav class="bg-light d-flex align-items-center justify-content-between">
    <div class="logo">
        <h2>@yield('user')</h2>
    </div>
    <ul class="nav-links m-0 d-flex align-items-center justify-content-between">
        {{-- <li>
            <form action="/serarchUser" method="get" class="d-flex align-items-center justify-content-between">
                <input required="" type="text" placeholder="Search users" name="uName" class="mx-2 form-control">
                <button class="btn btn-primary">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </li> --}}
        <li>
            <a class="btn btn-success text-light" href="{{ route('projects.create') }}"><i
                    class="fa-solid px-2 fa-circle-plus"></i></a>
        </li>
        <li>
            <a class="btn btn-dark text-light" href="{{route("profile.edit")}}"><i class="fa-solid fa-user-pen px-2"></i></a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-danger text-light">
                    <i class="fa-solid fa-arrow-right-from-bracket px-2"></i>
                </button>
            </form>
        </li>
    </ul>
</nav>
