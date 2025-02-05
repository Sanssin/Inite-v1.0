<header id="header" class="header d-flex align-items-center fixed-top" style="background-color: rgba(40, 58, 90, 0.9);">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ request()->is('nuclearpediaDetail') ? url('/') . '#hero' : '#hero' }}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Inite</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ request()->is('nuclearpediaDetail') ? url('/') . '#hero' : '#hero' }}" class="active">Home</a></li>
          <li><a href="{{ request()->is('nuclearpediaDetail') ? url('/') . '#about' : '#about' }}">About</a></li>
          <li><a href="{{ request()->is('nuclearpediaDetail') ? url('/') . '#services' : '#services' }}">Services</a></li>
          <li><a href="{{ request()->is('nuclearpediaDetail') ? url('/') . '#nuclearpedia' : '#nuclearpedia' }}">Nuclearpedia</a></li>
          <li><a href="{{ request()->is('nuclearpediaDetail') ? url('/') . '#team' : '#team' }}">Team</a></li>
          <li><a href="{{ request()->is('nuclearpediaDetail') ? url('/') . '#contact' : '#contact' }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#about">Get Started</a>
    
      <ul class="navbar-nav">
        <li class="nav-item dropdown profile-dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('template/assets/img/default.png') }}" alt="user" width="40" class="profile-pic rounded-circle object-fit-cover" />
          </a>
          <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up text-center">
            <div class="card-body profile-card">
              <center class="mt-4">
                <img src="{{ asset('template/assets/img/default.png') }}"/>
                <h3 class="mt-2 text-dark">Guest</h3>
              </center>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </header>