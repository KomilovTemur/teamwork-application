<nav class="bg-light d-flex align-items-center justify-content-between">
  <div class="logo">
    <h2>@yield('user')</h2>
  </div>
  <ul class="nav-links m-0 d-flex align-items-center justify-content-between">
    <li>
      <form action="/serarchUser" method="get" class="d-flex align-items-center justify-content-between">
        <input required="" type="text" placeholder="Search users" name="uName" class="mx-2 form-control">
        <button class="btn btn-primary">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </li>
    <li>
      <a class="btn btn-success text-light" href="/project/addPoject"><i class="fa-solid px-2 fa-circle-plus"></i>Add project</a>
    </li>
    <li>
      <a class="btn btn-dark text-light" href="/editProfile"><i class="fa-solid fa-user-pen px-2"></i>Edit profile</a>
    </li>
    <li>
      <a class="btn btn-danger text-light" href="{{route('logout')}}">Log Out<i class="fa-solid fa-arrow-right-from-bracket px-2"></i></a>
    </li>
  </ul>
</nav>