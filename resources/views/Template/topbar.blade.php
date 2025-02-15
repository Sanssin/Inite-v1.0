<header id="header" class="header d-flex align-items-center fixed-top" style="background-color: rgba(40, 58, 90, 0.9);">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="{{ request()->route('slug') ? url('/') . '#hero' : '#hero' }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Inite</h1>
      </a>

      <nav id="navmenu" class="navmenu">
      <ul>
          <li><a href="{{ request()->route('slug') ? url('/') . '#hero' : '#hero' }}" class="active">Home</a></li>
          <li><a href="{{ request()->route('slug') ? url('/') . '#about' : '#about' }}">About</a></li>
          <li><a href="{{ request()->route('slug') ? url('/') . '#services' : '#services' }}">Services</a></li>
          <li><a href="{{ request()->route('slug') ? url('/') . '#nuclearpedia' : '#nuclearpedia' }}">Nuclearpedia</a></li>
          <li><a href="{{ request()->route('slug') ? url('/') . '#team' : '#team' }}">Team</a></li>
          <li><a href="{{ request()->route('slug') ? url('/') . '#contact' : '#contact' }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#about">Get Started</a>
    
      <ul class="navbar-nav">
      <li class="nav-item dropdown profile-dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('template/assets/img/default.png') }}" alt="user" width="40" class="profile-pic rounded-circle object-fit-cover" />
        </a>
        <div class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="navbarDropdown">
          <div class="card" style="width: 18rem;">
            <img src="{{ asset('template/assets/img/default.png') }}" class="card-img-top rounded-circle mx-auto mt-3" alt="Profile Picture" style="width: 80px; height: 80px;">
            <div class="card-body text-center">
              <h3 class="card-title">Guest</h3>
              <p class="card-text text-muted">user@example.com</p>
              <hr>
              <a href="#" class="btn btn-primary btn-sm w-100 mb-2">Profile</a>
              <a href="#" class="btn btn-secondary btn-sm w-100 mb-2">Settings</a>
              <a href="#" class="btn btn-danger btn-sm w-100">Logout</a>
            </div>
          </div>
        </div>
      </li>
    </ul>
    </div>
  </header>