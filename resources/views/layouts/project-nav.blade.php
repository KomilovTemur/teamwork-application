<nav class="navbar px-5 sticky-top bg-body-tertiary navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('projects.show', $project->id) }}"><i class="fas fa-code"></i> Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-bug"></i> Issues</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-users"></i> Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-play-circle"></i> Actions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('projects.edit', $project->id) }}"><i class="fas fa-gear"></i>
            Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Viewers @yield('viewers')</a>
        </li>
      </ul>
    </div>
    <span class="navbar-text">
      <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
    </span>
  </div>
</nav>
