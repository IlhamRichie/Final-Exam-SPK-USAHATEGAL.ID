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

  <!-- Template Main CSS File -->
  <link href="{{ asset('/Arsha/css/style.css') }}" rel="stylesheet">

  <!-- Custom Styles -->
  <style>
    .footer {
      background-color: goldenrod;
    }
    .copyright {
      background-color: goldenrod;
    }
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
      background: goldenrod;
    }

    #hero {
      width: 100%;
      height: 0px !important;
      background: goldenrod;
    }

    .card {
      margin-bottom: 40px;
      background: goldenrod;
    }

    /* CSS for modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
      align-items: center;
      justify-content: center;
      background: goldenrod;
    }

    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      max-width: 60%;
      width: 600px;
      border-radius: 5px;
      position: relative;
      color: #000;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .modal-content strong {
      font-weight: bold;
    }

    .modal-content .keterangan {
      margin-top: 10px;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover {
      color: #555;
    }

    .keterangan {
      max-width: 100%;
      word-wrap: break-word;
    }

    @media screen and (max-width: 600px) {
      .modal-content {
        max-width: 90%;
        width: auto;
      }
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="{{ url('/home') }}">USAHATEGAL.ID</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ url('/home') }}">Home</a></li>
          <li><a class="nav-link scrollto active" href="{{ url('/hasilsaw') }}">Fitur Rekomendasi</a></li>
          <li><a class="getstarted scrollto" href="{{ url('/login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height:35px;"></section>

  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="hasilsaw" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>REKOMENDASI TEMPAT USAHA KULINER TERBAIK</h2>
        </div>
        <div class="row content">
          <div class="col-lg-12">
            <form action="{{ route('home.filter') }}" method="post">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    {{ show_error($errors) }}
                    {{ csrf_field() }}
                    <?= get_pencarian_option($arrfilter); ?>
                    <div class='col-md-1' style='margin:5px;'>
                      <div class='form-group row'>
                        <label> &nbsp;</label>
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Filter</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <h3 class="card-title">{{ $juduldata }}</h3>
          </div>
          <div class="card-body p-0">
            <div class="row">
              @php $dataExists = false; $count = 0; @endphp
              @foreach($saw->rank as $key => $val)
                <?php
                    $x = 0;
                    $arrhasil = array();
                    foreach ($kriteriaku as $kriteria) {
                        $kodealternatif = $alternatifs[$key]->kode_alternatif;
                        $kodekriteria = $kriteria->kode_kriteria;

                        $idcrisp = get_crisp_by_AK($kodealternatif, $kodekriteria);
                        $pencarian = $arrfilter[$x];

                        if ($pencarian == null) {
                            $hasil = "benar";
                        }

                        if ($pencarian != null && $idcrisp == $pencarian) {
                            $hasil = "benar";
                        } else if ($pencarian == null) {
                            $hasil = "benar";
                        } else {
                            $hasil = "salah";
                        }

                        array_push($arrhasil, $hasil);

                        $x++;
                    }

                    $jumlahsalah = 0;
                    for ($i = 0; $i < sizeof($arrhasil); $i++) {
                        if ($arrhasil[$i] == "salah") {
                            $jumlahsalah++;
                        }
                    }

                    if ($jumlahsalah == 0) {
                        $dataExists = true;
                ?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 gy-4 my-4">
                  <div class="card">
                    <a href="#" onclick="showModal('{{ $alternatifs[$key]->nama_alternatif }}', '{{ $alternatifs[$key]->keterangan }}', '{{ asset(',fotolaptop/'.$alternatifs[$key]->foto) }}', '{{ $alternatifs[$key]->harga }}')">
                      <img src="{{ asset('fotolaptop/'.$alternatifs[$key]->foto) }}" alt="" class="card-img-top" style="width: 100%;">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title" style="height: 60px; overflow: hidden;">{{ $alternatifs[$key]->nama_alternatif }}</h5>
                      <p class="card-text mb-0"><strong>RP. {{ $alternatifs[$key]->harga }}</strong></p>
                    </div>
                  </div>
                </div>
                <?php
                    $count++;
                    if ($count % 4 == 0) {
                        echo '</div><div class="row">';
                    }
                ?>
                <?php } ?>
              @endforeach

              @if (!$dataExists)
                <div class="col-md-12">
                  <table class="table table-bordered text-center">
                    <tr>
                      <th colspan="3" style="font-size: 24px; font-weight: bold;">Tempat Usaha Kuliner Tidak Tersedia</th>
                    </tr>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <!-- Pop-up Modal -->
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <div id="modal-body"></div>
        </div>
      </div>

      <!-- JavaScript for modal -->
      <script>
        var images = document.getElementsByTagName("img");
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];

        function showModal(namaLaptop, keterangan, foto, harga) {
          var modalBody = document.getElementById("modal-body");
          modalBody.innerHTML = "";

          var rowHTML = "<p><strong>" + namaLaptop + "</strong></p>";
          rowHTML += "<p class='keterangan'>" + keterangan + "</p>";
          rowHTML += "<p class='harga'><strong>RP. " + harga + "</strong></p>";
          rowHTML += "<img src='" + foto + "' alt='' style='max-width: 100%; height: auto;'>";
          modalBody.innerHTML = rowHTML;

          modal.style.display = "block";

          window.addEventListener("scroll", function() {
            var top = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
            modal.style.top = top + "px";
          });
        }

        span.onclick = function() {
          modal.style.display = "none";
        }

        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      </script>
    </section>
  </main>

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
  </footer>

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
