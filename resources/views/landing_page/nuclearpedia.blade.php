<section id="nuclearpedia" class="nuclearpedia section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>nuclearpedia</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <ul class="nuclearpedia-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-app">App</li>
        <li data-filter=".filter-product">Card</li>
        <li data-filter=".filter-branding">Web</li>
      </ul><!-- End nuclearpedia Filters -->

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

      @if(isset($nuclearpediaItems) && $nuclearpediaItems->count() > 0)
          @foreach ($nuclearpediaItems as $item)
              <div class="col-md-4">
                  <div class="card">
                      {{-- Cek apakah item memiliki relasi images --}}
                      @if($item->image && isset($item->image->image_path)) 
                          <img src="{{ asset('storage/' . $item->image->image_path) }}" class="card-img-top" alt="{{ $item->title }}">
                      @else
                          <img src="{{ asset('template/assets/img/default-image.jpg') }}" class="card-img-top" alt="No Image Available">
                      @endif
                      
                      <div class="card-body">
                          <h5 class="card-title">{{ $item->title }}</h5>
                          <p class="card-text">{{ Str::limit($item->description, 100) }}</p>

                          {{-- Pastikan slug tidak kosong sebelum membuat link --}}
                          @if(!empty($item->slug))
                              <a href="{{ route('nuclearpedia.detail', $item->slug) }}" class="btn btn-success">Buka Materi</a>
                          @else
                              <button class="btn btn-secondary" disabled>Materi Tidak Tersedia</button>
                          @endif
                      </div>
                  </div>
              </div>
          @endforeach
      @else
          <p class="text-center">Tidak ada data nuclearpedia.</p>
      @endif

      </div><!-- End nuclearpedia Container -->

    </div>

  </div>

</section><!-- /nuclearpedia Section -->
