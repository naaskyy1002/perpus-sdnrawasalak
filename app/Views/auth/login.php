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
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/masuk.css') ?>" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1wZxUp/M5JqYmfL5t+SzJMCfgh84dIx0n0B+7N5qG250TqeCyABrAOq+IRcTxhgmZXt8+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header class="header fixed-top d-flex align-items-center">
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
          </ul>
      </nav>
  </header>

  <main class="container px-0" style="max-width: 1200px;">
    <div class="row w-100">
      <div class="col-12 col-md-6 d-flex justify-content-center align-items-center mt-5 mt-md-0">
        <div class="illustration" style="margin-left: -5px;">
          <img src="<?= base_url('assets/img/BUKU.png') ?>" alt="Illustration" class="img-fluid" style="max-width: 555px;">
        </div>
      </div>

            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
              <div class="card">
                <div class="card-body">
                  <h3 class="mb-4 text-center heading">SDN RAWASALAK</h3>
                  <?php if (!empty(session()->getFlashdata('login_fail'))) { ?>
                  <div class="alert alert-danger alert-dismissible fade show alertdismiss" role="alert">
                      <?php echo session()->getFlashdata('login_fail') ?>
                  </div>
                  <?php } ?>

                  <form method="post" action="<?= base_url('auth/valid-login') ?>">
                    <div class="form-group">
                      <input type="text" name="username" placeholder="Username" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" placeholder="Kata Sandi" class="form-control" required>
                    </div>
                    <div class="row justify-content-center my-3 px-3">
                      <button type="submit" class="button">MASUK</button>
                    </div>
                  </form>
                  <div class="pt-4 text-center">
                    <span>Copyright &copy; <text class="text-primary">SDN Rawasalak</text> <?=date('Y')?></span>
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<!-- Alert auto close -->
  <script>
      window.setTimeout(function() {
          $(".alertdismiss").fadeTo(300, 0).slideUp(300, function(){
              $(this).remove(); 
          });
      }, 3000);
  </script>
</body>
</html>
