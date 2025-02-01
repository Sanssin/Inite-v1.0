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
          <li><a href="{{ request()->is('nuclearpediaDetail') ? url('/') . '#nuclearpedia' : '#nuclearpedia' }}">Nuclearpedia</a></li>
          <li><a href="{{ request()->is('nuclearpediaDetail') ? url('/') . '#services' : '#services' }}">Services</a></li>
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
          <div
            class="
            dropdown-menu dropdown-menu-end
            mailbox
            dropdown-menu-animate-up
          ">
            <ul class="list-style-none">
              <li class="p-30 pb-2">
              <div class="rounded-top d-flex align-items-center">
                <h3 class="card-title mb-0">Profil Kamu</h3>
                  <div class="ms-auto">
                    <a href="javascript:void(0)" class="link py-0">
                    <i data-feather="x-circle"></i>
                    </a>
                  </div>
              </div>
              <div class="d-flex align-items-center mt-4 pt-3 pb-4 border-bottom">
                <img src="{{ asset('template/assets/img/default.png') }}" alt="user" width="90" class="rounded-circle object-fit-cover" />
                  <div class="ms-4">
                    <h4 class="mb-0">
                      Ihsan</h4>
                    <span class="text-muted">Administrator</span>
                    <p class="text-muted mb-0 mt-1">
                    <i data-feather="mail" class="feather-sm me-1"></i>
                    email
                    </p>
                  </div>
              </div>
              </li>
              <li class="p-30 pt-0">
                <div class="message-center message-body position-relative" style="height: 150px">
                </div>
                <div class="mt-0 d-flex justify-content-center">
                  <a href="javascript:void(0)" class="btn btn-primary btn-sm">Lihat Profil</a>
              </div>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </header>