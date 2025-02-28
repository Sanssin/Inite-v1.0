<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Upload Materi - Arsha Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('template/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- Main CSS File -->
  <link href="{{ asset('template/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="upload-page" >

  @include('Template.topbar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="margin-top: 85px;">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Upload Materi</li>
          </ol>
        </nav>
        <h1>Upload Materi</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Upload Section -->
    <section id="upload-section" class="upload-section section">

      <div class="container" data-aos="fade-up">
        <form action="{{ route('nuclearpedia.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="judul" class="form-label"> Judul</label>
            <input type="text" class="form-control shadow-sm" id="judul" name="judul" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <textarea class="form-control" id="author" name="author" required></textarea>
          </div>
          <div class="mb-3">
            <label for="file" class="form-label">File (docx/pdf)</label>
            <input type="file" class="form-control" id="file" name="file" accept=".docx,.pdf" required>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (png/jpg/img)</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept=".png,.jpg,.jpeg" required>
          </div>
          <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>

    </section><!-- /Upload Section -->

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