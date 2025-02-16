/**
* Template Name: Arsha
* Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
* Updated: Aug 07 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
      let configElement = swiperElement.querySelector(".swiper-config");
  
      // Validasi: Pastikan elemen .swiper-config ada dan memiliki konten
      if (!configElement || !configElement.innerHTML.trim()) {
        console.error("Swiper config is missing or empty for element:", swiperElement);
        return; // Lewati elemen ini
      }
  
      // Ambil konten JSON dan trim spasi
      let configContent = configElement.innerHTML.trim();
      console.log("Swiper config content:", configContent); // Debugging
  
      let config;
      try {
        // Parse JSON
        config = JSON.parse(configContent);
      } catch (error) {
        console.error("Failed to parse Swiper config:", error);
        return; // Lewati elemen ini
      }
  
      // Pastikan slidesPerView default adalah 1
      config = {
        slidesPerView: 1, // **Pastikan hanya satu gambar per tampilan**
        spaceBetween: 20,
        loop: true, // **Aktifkan looping**
        autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
        pagination: {
          el: ".swiper-pagination",
          type: "bullets",
          clickable: true
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        breakpoints: {
          640: {
            slidesPerView: 1, // **Tetap 1 gambar di layar kecil**
            spaceBetween: 10
          },
          768: {
            slidesPerView: 1, // **Tetap 1 gambar di layar menengah**
            spaceBetween: 20
          },
          1024: {
            slidesPerView: 1, // **Tetap 1 gambar di layar besar**
            spaceBetween: 30
          }
        }
      };
  
      // Inisialisasi Swiper
      const swiper = new Swiper(swiperElement, {
        ...config,
        on: {
          init: function () {
            // Nonaktifkan loop dan autoplay jika hanya ada satu gambar
            if (this.slides.length <= 1) {
              this.autoplay.stop();
              this.loop = false;
            }
          },
          slideChange: function () {
            this.autoplay.start();
          },
          touchStart: function () {
            this.autoplay.stop();
          },
          touchEnd: function () {
            this.autoplay.start();
          },
          mouseenter: function () {
            this.autoplay.stop();
          },
          mouseleave: function () {
            this.autoplay.start();
          },
        },
      });
  
      // Sembunyikan tombol navigasi dan pagination jika hanya ada satu gambar
      if (swiper.slides.length <= 1) {
        const nextButton = swiperElement.querySelector(".swiper-button-next");
        const prevButton = swiperElement.querySelector(".swiper-button-prev");
        const pagination = swiperElement.querySelector(".swiper-pagination");
  
        if (nextButton) nextButton.style.display = "none";
        if (prevButton) prevButton.style.display = "none";
        if (pagination) pagination.style.display = "none";
      }
    });
  }
  
  window.addEventListener("load", initSwiper);
  

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'fitRows';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item,.col-md-4',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
      initIsotope.layout();
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

})();
