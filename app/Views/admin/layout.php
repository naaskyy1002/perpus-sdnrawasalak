<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PERPUSTAKAAN SDN RAWASALAK</title>
  <meta content="" name="description">
  <meta content="" name="keywords"> 
  
  <!-- Favicons -->
  <link href="<?= base_url('assets/img/LOGO-BARU.png') ?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a class="logo d-flex align-items-center">
      <div class="d-flex flex-column text-center">
        <span class="d-none d-lg-block">SD NEGERI RAWASALAK</span>
        <span class="d-none d-lg-block">E-LIBRARY</span>
      </div>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0">
            <span class="d-none d-md-block ps-2"><i class="bi bi-people"></i> Raina Rahmawati</span>
          </a>
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <a class="nav-link nav-profile d-flex flex-column align-items-center pe-0">
      <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
      <span class="d-none d-md-block pt-2">Raina Rahmawati F</span>
    </a>

    <li class="nav-item">
      <a class="nav-link" href=<?= base_url('home');?>>
        <i class="bi bi-grid"></i>
        <span>Beranda</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Data Buku</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href=<?= base_url('peminjaman');?>>
            <i class="bi bi-circle"></i><span>Peminjaman</span>
          </a>
        </li>
        <li>
          <a href=<?= base_url('buku_layak');?>>
            <i class="bi bi-circle"></i><span>Buku Layak</span>
          </a>
        </li>
        <li>
          <a href=<?= base_url('buku_rusak');?>>
            <i class="bi bi-circle"></i><span>Buku Rusak</span>
          </a>
        </li>
        
      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Data Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href=<?= base_url('data_admin');?>>
            <i class="bi bi-circle"></i><span>Data Admin</span>
          </a>
        </li>
        <li>
          <a href=<?= base_url('data_guru');?>>
            <i class="bi bi-circle"></i><span>Data Guru</span>
          </a>
        </li>
        <li>
          <a href=<?= base_url('Data Siswa');?>>
            <i class="bi bi-circle"></i><span>Data Siswa</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link" href=<?= base_url('daftar_pengunjung');?>>
        <i class="bi bi-journal-text"></i><span>Daftar Pengunjung</span>
      </a>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link" href=<?= base_url('jadwal_kunjungan');?>>
        <i class="bi bi-layout-text-window-reverse"></i><span>Jadwal Kunjungan</span>
      </a>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
        <a class="nav-link" href=<?= base_url('login');?>>
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Keluar</span>
        </a>
      </li><!-- End Logout Page Nav -->

  </ul>
  </aside><!-- End Sidebar-->

  <?=$this->renderSection('content');?>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer mt-auto">
    <div class="copyright">
      <p>COPYRIGHT © 2024 SDN RAWASALAK</p>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src=<?= base_url('assets/vendor/apexcharts/apexcharts.min.js')?>></script>
  <script src=<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>></script>
  <script src=<?= base_url('assets/vendor/chart.js/chart.umd.js')?>></script>
  <script src=<?= base_url('assets/vendor/echarts/echarts.min.js')?>></script>
  <script src=<?= base_url('assets/vendor/quill/quill.js')?>></script>
  <script src=<?= base_url('assets/vendor/simple-datatables/simple-datatables.js')?>></script>
  <script src=<?= base_url('assets/vendor/tinymce/tinymce.min.js')?>></script>
  <script src=<?= base_url('assets/vendor/php-email-form/validate.js')?>></script>

  <!-- Template Main JS File -->
  <script src=<?= base_url('assets/js/main.js')?>></script>

</body>

</html>