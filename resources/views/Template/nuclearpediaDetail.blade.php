<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title','Nuclearpedia Details')</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('template/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('template/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="nuclearpedia-details-page">

@include('Template.topbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="margin-top: 85px;">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') . '#hero' }}">Home</a></li>
            <li class="current">Nuclearpedia Details</li>
          </ol>
        </nav>
        <h1>Nuclearpedia Details</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- nuclearpedia Details Section -->
    <section id="nuclearpedia-details" class="nuclearpedia-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="nuclearpedia-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="{{ asset('template/assets/img/nuclearpedia/app-1.jpg') }}" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="{{ asset('template/assets/img/nuclearpedia/product-1.jpg') }}" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="{{ asset('template/assets/img/nuclearpedia/branding-1.jpg') }}" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="{{ asset('template/assets/img/nuclearpedia/books-1.jpg') }}" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="nuclearpedia-info" data-aos="fade-up" data-aos-delay="200">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: Web design</li>
                <li><strong>Client</strong>: ASU Company</li>
                <li><strong>Project date</strong>: 01 March, 2020</li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
              </ul>
            </div>
            
          </div>
          <div class="nuclearpedia-description" data-aos="fade-up" data-aos-delay="300">
              <h2>Nuclearpedia</h2>
              <p style="white-space: pre-line;">
                <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. -->
                {{ $content }}
              </p>
          </div>
        </div>

      </div>

    </section><!-- /nuclearpedia Details Section -->

  </main>

  @include('Template.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('template/assets/js/main.js') }}"></script>

</body>

</html>