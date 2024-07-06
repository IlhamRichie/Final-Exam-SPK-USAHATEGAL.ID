<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aplikasi SPK Metode SAW</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- UsahaTegalPHBs -->
  <link href="{{ asset('/Arsha/img/UsahaTegalPHB.png') }}" rel="icon">
  <link href="{{ asset('/Arsha/img/UsahaTegalPHB.png') }}" rel="UsahaTegalPHB">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- {{ asset('/AdminLTE/dist/css/adminlte.min.css') }}  -->
  <link href="{{ asset('/Arsha/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('/Arsha/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/Arsha/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.9.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  <style>
  
  
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

#hero {
    width: 100%;
    height: 0px !important;
    background: #37517E ;
}

.card {
	margin-bottom:40px;
}

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ url('/') }}">USAHATEGAL.ID</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ url('/home') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/hasilsaw') }}">Fitur Rekomendasi</a></li>
          <li><a class="getstarted scrollto" href="{{ url('/login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
 
 
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height:35px @important;" >
 

  </section><!-- End Hero -->

  
  
  <main id="main">

 
    <!-- ======= About Us Section ======= -->
    <section id="hasilsaw" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>DETAIL TEMPAT USAHA</h2>
        </div>

        <div class="col-md-12 mt-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"> Home </a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_alternatif }}</li>
            </ol>
          </nav>
        </div>

        <div class="row content">
          <div class="col-lg-12">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6" style="width: 19rem;">
                      <img src="{{ asset('fototempat/'.$barang->foto)}}" class="rounded mx-auto d-block" width="100%" alt="">
                    </div>
                    <div class="col-md-6 mt-3">
                      <h2>{{ $barang->nama_alternatif }}</h2>
                      <table class="table">
                        <tbody>
                        <div class="col-md-6 mt-4">
                          <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>{{ $barang->keterangan }}</td>
                          </tr>
                          <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>{{ $barang->harga }}</td>
                          </tr>
                          <tr>
                            <td>Link Pembelian</td>
                            <td>:</td>
                            <td><a href="{{ $barang->link_pembelian }}">Klik Disini</td></a>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
     </section><!-- End About Us Section -->
   </main><!-- End #main -->
 
   <!-- ======= Footer ======= -->
   <footer id="footer">
     <div class="container footer-bottom clearfix">
       <div class="copyright">
         &copy; Copyright <strong><span><?= date("Y") ?></span></strong>
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
 
   <!--  {{ asset('/AdminLTE/dist/css/adminlte.min.css') }}  -->
   
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