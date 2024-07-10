<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PERPUSTAKAAN SDN RAWASALAK</title>
  <meta content="" name="description">
  <meta content="" name="keywords"> 
  
  <!-- Favicons -->
  <link href="assets/img/LOGO-BARU.png" rel="icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/siswa.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="toggle-sidebar">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <a class="logo d-flex align-items-center">
            <div class="d-flex flex-column text-center">
                <span class="d-none d-lg-block">SD NEGERI RAWASALAK</span>
                <span class="d-none d-lg-block">E-LIBRARY</span>
            </div>
         </a>
      
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <a class="nav-link nav-profile d-flex align-items-center pe-0">
            <span class="d-none d-md-block ps-2"><i class="bi bi-people"></i> Siti Nurazizah</span>
        </a>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <a class="nav-link nav-profile d-flex flex-column align-items-center pe-0">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block pt-2">Siti Nurazizah</span>
        </a>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('buku')?>"><i class="bi bi-book"></i> Koleksi Buku</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('pinjaman')?>"><i class="bi bi-clock-history"></i> Pinjaman Terkini</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('sejarah')?>"><i class="bi bi-journal-bookmark"></i> Riwayat Peminjaman</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('pages')?>"><i class="bi bi-box-arrow-right"></i> Keluar</a></li>
    </ul>
  </aside>
  <!-- End Sidebar-->

  <?=$this->renderSection('body');?>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer mt-auto">
    <div class="copyright">
      <p>COPYRIGHT © 2024 SDN RAWASALAK</p>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src=<?=base_url('assets/vendor/apexcharts/apexcharts.min.js')?>></script>
  <script src=<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>></script>
  <script src=<?=base_url('assets/vendor/chart.js/chart.umd.js')?>></script>
  <script src=<?=base_url('assets/vendor/echarts/echarts.min.js')?>></script>
  <script src=<?=base_url('assets/vendor/quill/quill.js')?>></script>
  <script src=<?=base_url('assets/vendor/simple-datatables/simple-datatables.js')?>></script>
  <script src=<?=base_url('assets/vendor/tinymce/tinymce.min.js')?>></script>
  <script src=<?=base_url('assets/vendor/php-email-form/validate.js')?>></script>

  <!-- Template Main JS File -->
  <script src=<?=base_url('assets/js/main.js')?>></script>

</body>

</html>