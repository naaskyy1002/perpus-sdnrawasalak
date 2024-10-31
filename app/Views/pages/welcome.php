<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  
  <!-- Favicons -->
  <link rel="icon" href="<?= base_url('assets/img/LOGO-BARU-RAWASALAK-2024.png') ?>">
  <link rel="apple-touch-icon" href="<?= base_url('assets/img/apple-touch-icon.png') ?>">
  
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">
 
  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/tentang_kami.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1wZxUp/M5JqYmfL5t+SzJMCfgh84dIx0n0B+7N5qG250TqeCyABrAOq+IRcTxhgmZXt8+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="logo d-flex align-items-center">
            <img src="<?= base_url('assets/img/LOGO-BARU-RAWASALAK-2024.png') ?>" alt="Logo SD" class="logo-img">
            <div class="logo-text d-flex flex-column text-center">
              <span class="d-none d-lg-block">SD NEGERI RAWASALAK</span>
              <span class="d-none d-lg-block">E-LIBRARY</span>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="<?= base_url('/') ?>">BERANDA</a></li>
                <li><a href="<?= base_url('tentang_kami') ?>">TENTANG KAMI</a></li>
                <li><a href="<?= base_url('kontak') ?>">KONTAK</a></li>
                <li><a href="<?= base_url('login') ?>">MASUK</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <section class="light">
    <div class="container py-2">
            <article class="postcard light blue">
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title blue"><a href="#">SD NEGERI RAWASALAK</a></h1>
                    <div class="postcard__preview-txt">
                        <p>Selamat Datang Di Perpustakaan SDN Rawasalak</p>
                        <p>Temukan berbagai koleksi buku yang mendukung belajar dan meningkatkan minat baca</p>
                        <a href="<?= base_url('login') ?>" class="button">JELAJAHI SEKARANG</a>
                    </div>
                </div>
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="<?= base_url('assets/img/Sekolah 2.jpeg')?>" alt="Image Title" />
                </a>
            </article>   
    </div>

    <div class="container">
        <div class="h1 text-center text-dark" id="pageHeaderTitle">Buku-Buku Terpopuler</div>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/buku/B003.jpg')?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tersedia</h5>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="btn btn-simpan btn-sm viewModalid">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/buku/B005.jpeg')?>" alt="" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title text-center">Tersedia</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="btn btn-simpan btn-sm viewModalid">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/buku/B008.jpeg')?>" alt="" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title text-center">Tersedia</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="btn btn-simpan btn-sm viewModalid">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="h1 text-center text-dark" id="pageHeaderTitle">Data Perpustakaan</div>
        <div class="row">
            <div class="col-lg-3 mb-3">
                <div class="card">
                    <h5 class="card-body">TOTAL BUKU</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-book-2-line"></i>
                        </div>
                    <h5 class="card-body"><?=$total_buku;?></h5> 
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card">
                <h5 class="card-body">TOTAL SISWA</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-book-2-line"></i>
                        </div>
                    <h5 class="card-body"><?=$total_siswa;?></h5> 
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card">
                <h5 class="card-body">TOTAL PENGUNJUNG</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-book-2-line"></i>
                        </div>
                    <h5 class="card-body">25</h5> 
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card">
                <h5 class="card-body">TOTAL PEMINJAMAN</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-book-2-line"></i>
                        </div>
                    <h5 class="card-body"><?=$total_transaksi;?></h5> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const header = document.querySelector("header");
            
            window.addEventListener("scroll", function() {
                if (window.scrollY > 50) {
                    header.classList.add("scrolled");
                } else {
                    header.classList.remove("scrolled");
                }
            });
        });
    </script>

</section>
</main>

<footer class="text-center bg-body-tertiary">
  <div class="container pt-4">
    <section class="mb-4">
      <!-- Facebook -->
      <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body m-1"
        href="https://www.facebook.com/sdn.rawasalak?mibextid=ZbWKwL"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="bi bi-facebook"></i
      ></a>

      <!-- Instagram -->
      <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body m-1"
        href="https://www.instagram.com/sdnrawasalak_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="bi bi-instagram"></i
      ></a>

      <!-- YouTube -->
      <a
        data-mdb-ripple-init
        class="btn btn-link btn-floating btn-lg text-body m-1"
        href="https://youtube.com/@sdnegerirawasalak8805?si=ZcdSeBzbPTnCKRC5"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="bi bi-youtube"></i
      ></a>
    </section>
    <span>Copyright &copy; <text class="text-primary">SDN Rawasalak</text> <?=date('Y')?></span>
  </div>
</footer>

</body>
</html>