<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $title ?></title>

  <!-- Favicons -->
  <link rel="icon" href="<?= base_url('assets/img/LOGO-BARU-RAWASALAK-2024.png') ?>">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>"rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
  
  <!-- Main CSS File -->
  <link href="<?= base_url('assets/css/welcome.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1wZxUp/M5JqYmfL5t+SzJMCfgh84dIx0n0B+7N5qG250TqeCyABrAOq+IRcTxhgmZXt8+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

  <!-- JS Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center sticky-top">
    <div class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/img/LOGO-BARU-RAWASALAK-2024.png') ?>" alt="Logo SD" class="logo-img">
        <div class="logo-text d-flex flex-column text-center">
            <span class="d-none d-lg-block">SD NEGERI RAWASALAK</span>
            <span class="d-none d-lg-block">E-LIBRARY</span>
        </div>
    </div>
      <nav>
        <ul>
            <li><a href="<?= base_url('') ?>">BERANDA</a></li>
            <li><a href="<?= base_url('tentang_kami') ?>">TENTANG KAMI</a></li>
            <li><a href="<?= base_url('kontak') ?>">KONTAK</a></li>
            <li><a href="<?= base_url('login') ?>">MASUK</a></li>
        </ul>
      </nav>
  </header>

  <main class="main">
    <section id="hero" class="hero section dark-background">
      <img src="<?= base_url('assets/img/Sekolah 2.jpeg') ?>" alt="" data-aos="fade-in">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang di Perpustakaan</h2>
            <h2 data-aos="fade-up" data-aos-delay="100">SDN Rawasalak</h2>
            <p data-aos="fade-up" data-aos-delay="200">Temukan berbagai koleksi buku yang mendukung belajar dan meningkatkan minat baca.</p>
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
            <a href="<?= base_url('login') ?>" class="button">JELAJAHI SEKARANG</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services" class="services section">
      <div class="container section-title" data-aos="fade-up">
          <h2>Koleksi Buku</h2>
      </div>
      <div class="col-sm-12 col-md-4 ms-auto">
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="searchInput" placeholder="Masukkan keyword pencarian" name="keyword">
            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
          </div>
        </form>
      </div>

      <div class="container my-carousel-container">
        <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php 
                // Memecah data buku menjadi grup 5
                $chunkedBuku = array_chunk($buku, 5); 
                $totalChunks = count($chunkedBuku);
                foreach ($chunkedBuku as $index => $books): ?>
                    <div class="carousel-item <?= ($index === 0) ? 'active' : '' ?>"> <!-- Slide pertama sebagai aktif -->
                        <div class="row justify-content-center"> <!-- Pusatkan koleksi buku -->
                            <?php foreach ($books as $bk): ?>
                                <div class="col-lg-2 mb-2 book-item" data-title="<?= $bk['judul_buku'] ?>">
                                    <div class="card h-100">
                                        <img src="<?= base_url('assets/img/buku/' . $bk['sampul']) ?>" alt="<?= $bk['judul_buku'] ?>" class="card-img-top">
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><?= $bk['judul_buku'] ?></h5>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="btn btn-simpan btn-sm viewModalid"
                                              data-vsampul="<?= base_url('assets/img/buku/' . $bk['sampul']) ?>"
                                              data-vkodebuku="<?= $bk['kode_buku'] ?>"
                                              data-vjudulbuku="<?= $bk['judul_buku'] ?>"
                                              data-vpengarang="<?= $bk['pengarang'] ?>"
                                              data-vpenerbit="<?= $bk['penerbit'] ?>"
                                              data-vtahunterbit="<?= $bk['tahun_terbit'] ?>"
                                              data-vkategori="<?= $bk['kategori'] ?>"
                                              data-vnorak="<?= $bk['no_rak'] ?>"
                                              data-vjumlahbuku="<?= $bk['jumlah_buku'] ?>"
                                              data-vsinopsis="<?= $bk['sinopsis'] ?>"
                                            >Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><strong id="vjudulbuku"></strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex">
                        <div class="book-cover-container me-3">
                            <img src="<?= base_url('assets/img/buku/' . $bk['sampul']) ?>" alt="Book Cover" class="book-cover-detail" id="vsampul">
                        </div>
                        <div class="book-info">
                            <ul class="book-details">
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Kode Buku</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vkodebuku"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Pengarang</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vpengarang"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Penerbit</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vpenerbit"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Tahun Terbit</strong> </div>
                                    <div class="col-lg-7 col-md-8">: <span id="vtahunterbit"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Kategori</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vkategori"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Nomor Rak</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vnorak"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Jumlah Buku Tersedia</strong></div>
                                    <div class="col-lg-7 col-md-8">: <span id="vjumlahbuku"></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label"><strong>Sinopsis</strong></div>
                                    <span id="vsinopsis"></span>
                                </div>
                                <div id="buku-tidak-tersedia" class="text-danger" style="display: none;">Buku Tidak Tersedia</div> <!-- Elemen untuk pesan -->
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-abu" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(".viewModalid").click(function() {
                var vkodebuku = $(this).data('vkodebuku');
                $("#vkodebuku").text(vkodebuku);

                var vsampul = $(this).data('vsampul');
                $("#vsampul").attr("src", vsampul);

                var vjudulbuku = $(this).data('vjudulbuku');
                $("#vjudulbuku").text(vjudulbuku);

                var vpengarang = $(this).data('vpengarang');
                $("#vpengarang").text(vpengarang);

                var vpenerbit = $(this).data('vpenerbit');
                $("#vpenerbit").text(vpenerbit);

                var vtahunterbit = $(this).data('vtahunterbit');
                $("#vtahunterbit").text(vtahunterbit);

                var vkategori = $(this).data('vkategori');
                $("#vkategori").text(vkategori);

                var vnorak = $(this).data('vnorak');
                $("#vnorak").text(vnorak);

                var vjumlahbuku = $(this).data('vjumlahbuku');
                // Mengecek jika jumlah buku 0
                if (vjumlahbuku == 0) {
                    $("#vjumlahbuku").text("Buku Tidak Tersedia").addClass("not-available");
                } else {
                    $("#vjumlahbuku").text(vjumlahbuku).removeClass("not-available");
                }

                var vsinopsis = $(this).data('vsinopsis');
                $("#vsinopsis").text(vsinopsis);

                $('#viewModal').modal('show');
            });
        </script>
        <!-- Tombol Previous -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel" data-bs-slide="prev" <?= ($totalChunks <= 1) ? 'disabled' : ''; ?>>
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>

        <!-- Tombol Next -->
        <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel" data-bs-slide="next" <?= ($totalChunks <= 1) ? 'disabled' : ''; ?>>
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
      </div>
    </section>
    
    <script>
      $(document).ready(function() {
        // Pencarian
        $('#searchInput').on('keyup', function() {
          var keyword = $(this).val().toLowerCase();
          $('.book-item').each(function() {
            var title = $(this).data('title').toLowerCase();
            $(this).toggle(title.includes(keyword));
          });
        });
      });
    </script>

<section id="services" class="services section">
      <div class="container section-title" data-aos="fade-up">
          <h2>Data Perpustakaan</h2>
      </div>
    </section>
      <section id="stats" class="stats section">
          <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
              <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="<?=$total_buku;?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Total Buku</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="<?=$total_siswa;?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Total Siswa</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="<?=$total_pengunjung;?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Total Pengunjung</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="<?=$total_transaksi;?>" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Total Peminjaman</p>
                </div>
              </div>
            </div>
          </div>
      </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    new PureCounter();
  </script>

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
</main>

<footer>
  <span>Copyright &copy; <text class="text-primary">SDN Rawasalak</text> <?=date('Y')?></span>
</footer>

</body>
</html>
