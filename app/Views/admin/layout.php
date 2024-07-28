<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PERPUSTAKAAN SDN RAWASALAK</title>
  <meta content="" name="description">
  <meta content="" name="keywords"> 
  <link href="<?= base_url('assets/img/LOGO-BARU-RAWASALAK-2024.png') ?>" rel="icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a class="logo d-flex align-items-center">
        <div class="d-flex flex-column text-center">
          <span class="d-none d-lg-block">SD NEGERI RAWASALAK</span>
          <span class="d-none d-lg-block">E-LIBRARY</span>
        </div>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block ps-2"><i class="ri-user-line"></i><?= session()->get('nama_lengkap'); ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= session()->get('nama_lengkap'); ?></h6>
              <span><?= session()->get('level') == 1 ? 'Admin/Operator' : 'Siswa'; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/profilAdmin');?>">
                <i class="ri-user-line"></i>
                <span>Profil</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#modallogout">
                <i class="ri-logout-circle-r-line"></i>
                <span>Keluar</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <a class="nav-profile d-flex flex-column align-items-center pe-0">
        <img src="<?= base_url('assets/img/admin/' . session()->get('foto')); ?>" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block pt-2"><?= session()->get('nama_lengkap'); ?></span>
      </a>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin');?>">
          <i class="ri-function-line"></i>
          <span>Beranda</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-folders-line"></i><span>Data Data Buku</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('admin/buku');?>">
              <i class="ri-bookmark-3-line"></i><span>Data Buku Layak</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('admin/bukuRusak');?>">
              <i class="ri-bookmark-2-line"></i><span>Data Buku Rusak</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('admin/peminjaman');?>">
              <i class="ri-folder-shared-line"></i><span>Data Peminjaman</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('admin/pengembalian');?>">
              <i class="ri-folder-received-line"></i><span>Data Pengembalian</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-contacts-book-2-line"></i><span>Data Data Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('admin/dataAdmin');?>">
              <i class="ri-group-line"></i><span>Data Admin</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('admin/dataGuru');?>">
              <i class="ri-group-line"></i><span>Data Guru</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('admin/dataSiswa');?>">
              <i class="ri-group-line"></i><span>Data Siswa</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/daftarPengunjung');?>">
          <i class="ri-todo-line"></i><span>Daftar Pengunjung</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/jadwalKunjungan');?>">
          <i class="ri-calendar-2-line"></i><span>Jadwal Kunjungan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/auth/logout');?>" data-bs-toggle="modal" data-bs-target="#modallogout">
          <i class="ri-logout-circle-line"></i>
          <span>Keluar</span>
        </a>
      </li>
    </ul>
  </aside>

  <div class="min-vh-100">
    <?= $this->renderSection('content'); ?>
  </div>

  <footer id="footer" class="sticky-footer bg-white">
    <div class="copyright">
      Copyright &copy; <span class="text-primary">SDN Rawasalak</span> <?=date('Y')?>. All rights reserved.
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div class="modal fade" id="modallogout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Apakah anda ingin keluar?</h5>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
          <a class="btn btn-success" href="<?= base_url('/auth/logout');?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/chart.js/chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/echarts/echarts.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/quill/quill.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
  <script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>
</html>
