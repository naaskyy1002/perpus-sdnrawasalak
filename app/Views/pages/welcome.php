<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PERPUSTAKAAN SDN RAWASALAK</title>
  <!-- Favicons -->
  <link rel="icon" href="<?= base_url('assets/img/LOGO-BARU.png') ?>">
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
  <link href="<?= base_url('assets/css/welcome.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1wZxUp/M5JqYmfL5t+SzJMCfgh84dIx0n0B+7N5qG250TqeCyABrAOq+IRcTxhgmZXt8+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="header fixed-top d-flex align-items-center">
        <div class="logo d-flex align-items-center">
            <img src="<?= base_url('assets/img/LOGO-BARU.png') ?>" alt="Logo SD" class="logo-img">
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
            </ul>
        </nav>
    </header>
    <main>
        <div class="welcome-section">
            <div class="illustration">
                <img src="<?= base_url('assets/img/BUKU.png') ?>" alt="Illustration">
            </div>
            <div class="welcome-text">
                <h1>Selamat Datang Di Perpustakaan Digital</h1>
                <a href="<?= base_url('login') ?>" class="button">MASUK</a>
            </div>
        </div>
    </main>
    <footer>
                    <span>Copyright &copy; <text class="text-primary">SDN Rawasalak</text> <?=date('Y')?></span>
</footer>
</body>
</html>
