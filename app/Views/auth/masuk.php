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
  <link href="<?= base_url('assets/css/masuk.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1wZxUp/M5JqYmfL5t+SzJMCfgh84dIx0n0B+7N5qG250TqeCyABrAOq+IRcTxhgmZXt8+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<header id="header" class="header fixed-top d-flex align-items-center">
<div class="logo d-flex align-item-center">
            <img src="<?= base_url('assets/img/LOGO-BARU.png') ?>" alt="Logo SD" class="logo-img">
            <div class="logo-text d-flex flex-column text-center">
              <span class="d-none d-lg-block">SD NEGERI RAWASALAK</span>
              <span class="d-none d-lg-block">E-LIBRARY</span>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="<?= base_url('home'); ?>">BERANDA</a></li>
                <li><a href="<?= base_url('tentang_kami'); ?>">TENTANG KAMI</a></li>
                <li><a href="<?= base_url('kontak'); ?>">KONTAK</a></li>
            </ul>
        </nav>
  </header>
<main>
  <!-- <div class="row justify-content-around"> -->
<div class="container-fluid">
  <!-- <div class="row h-100 align-items-center"> -->
    <div class="col-md-6 d-flex align-items-center">
      <div class="illustration">
          <img src="<?= base_url('assets/img/BUKU.png') ?>" alt="Illustration" class="img-fluid">
        </div>
      </div>
      <!-- <div class="container-fluid"> -->
    <!-- <div class="container-fluid col-md-6 d-flex align-items-center ms-auto"> -->
    <!-- <div class="ms-auto"> -->
    <!-- <div class="row w-100"> -->
      <!-- <div class="login"> -->
          <div class="col-md-6 mb-12">
            <div class="card ms-auto">
              <div class="card-body">
                <h3 class="mb-4 text-center heading">SDN RAWASALAK</h3>
                <div class="form-group">
                  <label class="form-control-label text-muted">Nama Pengguna</label>
                  <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-control-label text-muted">Kata Sandi</label>
                  <input type="password" id="password" name="password" placeholder="Kata Sandi" class="form-control">
                </div>
                <div class="form-group text-right">
                  <a href="<?= base_url('lupapw'); ?>" class="text-muted">Lupa Kata Sandi?</a>
                </div>
                <div class="row justify-content-center my-3 px-3">
                  <a href="<?= base_url('home'); ?>" class="button">MASUK</a>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</main>
<footer>
        <p>COPYRIGHT © 2024 SDN RAWASALAK</p>
    </footer>
</body>
</html>