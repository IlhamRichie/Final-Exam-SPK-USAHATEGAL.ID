<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>USAHATEGAL.ID</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- UsahaTegalPHBs -->
  <link href="{{ asset('/Arsha/img/UsahaTegalPHB.png') }}" rel="icon">
  <link href="{{ asset('/Arsha/img/UsahaTegalPHB.png') }}" rel="UsahaTegalPHB">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/Arsha/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/Arsha/css/style.css') }}" rel="stylesheet">

  <style>
    /* .row-2 {
      background-color: goldenrod;
    } */

    .faq .faq-list a {
      display: inline;
      position: relative;
      font-family: "Poppins", sans-serif;
      font-size: 1em;
      line-height: 24px;
      font-weight: 500;
      padding: 0 0px;
      outline: none;
      cursor: pointer;
    }

    .btn-detail {
      background-color: #37517E;
      border: none;
    }

    .btn-detail:focus,
    .btn-detail:hover {
      background-color: #37517E;
      outline: none;
    }

    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    .card-img-top {
      height: 150px;
      object-fit: cover;
    }

    .card-body {
      text-align: center;
    }

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ url('/home') }}">USAHATEGAL.ID</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/hasilsaw') }}">Fitur Rekomendasi</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="{{ url('/login') }}">Login</a></li>
          <li><a class="getstarted scrollto" href="{{ url('/register') }}">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="min-height:655px">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1 style="font-size:2em;">CARI TEMPAT USAHA KULINER?</h1>
          <h2>Temukan Lokasi Bisnis Kuliner Impian Anda di Tegal dengan USAHATEGAL.ID!</h2>
          <div class="d-flex justify-content-center justify-content-lg-start"></div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('/Arsha/img/4.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>About Us</h2>
      <p>Selamat datang di USAHATEGAL.ID, platform pilihan Anda untuk menemukan lokasi bisnis kuliner terbaik di Tegal. Platform kami berdedikasi untuk membantu Anda menemukan tempat ideal untuk usaha kuliner Anda. Baik Anda sedang mencari kafe kecil atau ruang restoran yang besar, kami menyediakan daftar dan rekomendasi lengkap untuk memenuhi kebutuhan Anda. Misi kami adalah untuk mendukung pertumbuhan bisnis lokal dan mempermudah para pengusaha untuk sukses di industri kuliner.</p>
    </div>
    <div class="row">
      <!-- Card 1 -->
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-4">
        <div class="card">
        <img src="{{ asset('fototempat/1.png') }}" class="card-img-top" alt="Feature 3">
          <div class="card-body">
            <h5 class="card-title">Rekomendasi Lokasi</h5>
            <p class="card-text">Temukan lokasi usaha kuliner terbaik di Tegal berdasarkan rekomendasi yang telah terverifikasi.</p>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-4">
        <div class="card">
        <img src="{{ asset('fototempat/2.png') }}" class="card-img-top" alt="Feature 3">
          <div class="card-body">
            <h5 class="card-title">Informasi Detail</h5>
            <p class="card-text">Dapatkan informasi lengkap mengenai lokasi, harga, dan fasilitas dari tempat usaha yang tersedia.</p>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-4">
        <div class="card">
        <img src="{{ asset('fototempat/3.png') }}" class="card-img-top" alt="Feature 3">
          <div class="card-body">
            <h5 class="card-title">Review Pengguna</h5>
            <p class="card-text">Baca ulasan dan pengalaman dari pengguna lain yang telah menggunakan layanan kami.</p>
          </div>
        </div>
      </div>
      <!-- Card 4 -->
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-4">
        <div class="card">
        <img src="{{ asset('fototempat/4.png') }}" class="card-img-top" alt="Feature 3">
          <div class="card-body">
            <h5 class="card-title">Pencarian Mudah</h5>
            <p class="card-text">Gunakan fitur pencarian canggih untuk menemukan tempat usaha kuliner sesuai dengan kriteria Anda.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End About Section -->

  <div class="container">
    <div class="row">
      @foreach($barangs as $barang)
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 gy-4 my-4">
        <div class="card">
          <img src="{{ asset('fototempat/'.$barang->foto)}}" class="card-img-top" alt="image">
          <div class="card-body">
            <h5 class="card-title" style="height: 60px; overflow: hidden;">{{ $barang->nama_alternatif }}</h5>
            <p class="card-text"><strong>RP. {{ $barang->harga }}</strong></p>
          </div>
          <div class="card-footer">
            <form action="{{ url('/detail/'.$barang->kode_alternatif) }}" method="GET">
              @csrf
              <button class="btn btn-success btn-sm btn-detail" style="width: 100%;">Detail</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div style="text-align: center;">
      {{$barangs->onEachSide(1)->links()}}
    </div>
  </div>

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Contact Us</h2>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Tegal, Central Java, Indonesia</p>
            </div>
            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>usahategal@usahategal.id</p>
            </div>
            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+62 896 7091 6052</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>
      </div>
    </div>
  </section><!-- End Contact Section -->

  <!-- ======= Social Media Section ======= -->
  <section id="social-media" class="social-media">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Follow Us</h2>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="social-icon">
            <a href="https://poltekharber.ac.id/" target="_blank"><i class="bi bi-facebook"></i> Facebook</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="social-icon">
            <a href="https://informatika.poltekharber.ac.id/" target="_blank"><i class="bi bi-twitter"></i> Twitter</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="social-icon">
            <a href="https://www.instagram.com/eloooyhm" target="_blank"><i class="bi bi-instagram"></i> Instagram</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="social-icon">
            <a href="https://www.linkedin.com/in/ilhamriganagachi/" target="_blank"><i class="bi bi-linkedin"></i> LinkedIn</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Social Media Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; <strong><span><?= date("Y") ?></span></strong>&nbsp;UsahaTegal
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/Arsha/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/Arsha/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/Arsha/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/Arsha/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('/Arsha/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('/Arsha/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/Arsha/js/main.js') }}"></script>

</body>

</html>
