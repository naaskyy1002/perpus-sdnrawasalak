<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <!-- Favicons -->
  <link rel="icon" href="<?= base_url('assets/img/LOGO-BARU.png') ?>">
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
  <link href="<?= base_url('assets/css/kontak.css') ?>" rel="stylesheet">
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
              <li><a href="<?= base_url('login') ?>">MASUK</a></li>
          </ul>
      </nav>
  </header>
<main>
<section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                <h3>Alamat</h3> 
                <p>Jl. Bhayangkara Gg. Beringin<br>No. 53, Sriwidari Kec. Gunung Puyuh, Kota Sukabumi, Jawa Barat</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-clock"></i>
                <h3>Jam Buka</h3>
                <p>Senin - Sabtu<br>08:00 - 14:00</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-telephone"></i>
                <h3>Hubungi Kami</h3>
                <p> +62 858-1711-3864</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-envelope"></i>
                <h3>Email Kami</h3>
                <p>sdnegerirawasalak@gmail.com</p>
              </div>
            </div>
            
          </div>

        </div>

        <div class="col-xl-6">
          <div class="card p-4">
          <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
            <strong>Terima Kasih!</strong> Pesan Anda Sudah Terkirim.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            <form action="forms/contact.php" method="post" class="php-email-form" name="submit-to-google-sheet">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Email Anda" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subjek" placeholder="Subjek" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="pesan" rows="6" placeholder="Pesan" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary btn-kirim">Kirim Pesan</button>

                  <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                  </button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>
</main>
    <footer>
        <span>Copyright &copy; <text class="text-primary">SDN Rawasalak</text> <?=date('Y')?></span>
    </footer>

    <script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbyzk-ZFtVjpXTw-Ee_OTdKY-tsARM6kAyDSaekLND6koeqEWdzMFUiFDaLUMhZhQvYecg/exec';
  const form = document.forms['submit-to-google-sheet'];
  const btnKirim = document.querySelector('.btn-kirim');
  const btnLoading = document.querySelector('.btn-loading');
  const myAlert = document.querySelector('.my-alert');

  form.addEventListener('submit', e => {
    e.preventDefault();
    // Tampilkan tombol loading dan sembunyikan tombol kirim
    btnLoading.classList.toggle('d-none');
    btnKirim.classList.toggle('d-none');

    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then((response) => {
        // Sembunyikan tombol loading dan tampilkan tombol kirim kembali
        btnLoading.classList.toggle('d-none');
        btnKirim.classList.toggle('d-none');
        // Tampilkan alert
        myAlert.classList.remove('d-none');

        // Reset form
        form.reset();
        
        // Sembunyikan alert setelah 5 detik
        setTimeout(() => {
          myAlert.classList.add('d-none');
        }, 5000);

        console.log('Success!', response);
      })
      .catch(error => console.error('Error!', error.message));
  });
</script>

</body>
</html>