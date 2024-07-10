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
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/welcome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1wZxUp/M5JqYmfL5t+SzJMCfgh84dIx0n0B+7N5qG250TqeCyABrAOq+IRcTxhgmZXt8+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <header class="header fixed-top d-flex align-items-center">
        <div class="logo d-flex align-item-center">
            <img src="assets/img/LOGO-BARU.png" alt="Logo SD" class="logo-img">
            <div class="logo-text d-flex flex-column text-center">
              <span class="d-none d-lg-block">SD NEGERI RAWASALAK NANA</span>
              <span class="d-none d-lg-block">E-LIBRARY</span>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href=<?=base_url('home');?>>BERANDA</a></li>
                <li><a href=<?=base_url('tentang_kami');?>>TENTANG KAMI</a></li>
                <li><a href=<?=base_url('kontak');?>>KONTAK</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="welcome-section">
            <div class="illustration">
                <img src="assets/img/BUKU.png" alt="Illustration">
            </div>
            <div class="welcome-text">
                <h1>Selamat Datang Di Perpustakaan Digital</h1>
                <a href=<?= base_url ('login');?> class="button">MASUK</a>
            </div>
        </div>
    </main>
    <footer>
        <p>COPYRIGHT © 2024 SDN RAWASALAK</p>
    </footer>
</body>
</html>