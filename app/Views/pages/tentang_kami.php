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
		<div class="h1 text-center text-dark" id="pageHeaderTitle">SEJARAH SDN RAWASALAK</div>
            <article class="postcard light blue">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="<?= base_url('assets/img/LOGO-BARU-RAWASALAK-2024.png')?>" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title blue"><a href="#">SD NEGERI RAWASALAK</a></h1>
                    <div class="postcard__preview-txt">
                        <p>SD Negeri Rawasalak terletak di Jalan Bhayangkara Gg. Beringin No. 53 RT. 05 RW. 07 Kelurahan Sriwidari, Kecamatan Gunung Puyuh, Kota Sukabumi, dengan Kode Pos 43121. Sekolah ini resmi beroperasi sejak tahun 1979 berdasarkan Surat Keputusan izin operasional yang dikeluarkan pada tahun tersebut.</p>
                        <p>Sejak berdirinya, SDN Rawasalak telah mengalami berbagai perkembangan baik dari segi fisik maupun akademis. Dengan komitmen untuk memberikan pendidikan yang berkualitas, sekolah ini terus berupaya meningkatkan fasilitas dan sumber daya manusia.</p>
                        <p>Dalam beberapa dekade terakhir, SDN Rawasalak telah menjadi salah satu sekolah dasar unggulan di wilayah Kecamatan Gunungpuyuh Kota Sukabumi, dikenal dengan dedikasi para guru dan staf serta berkolaborasinya bersama orangtua dan masyarakat dalam mendidik siswa-siswinya. Sekolah ini mengadopsi Kurikulum Merdeka dengan tema “Merdeka Belajar” dengan motto “Religius, Adaptif, Kreatif” dan slogan “MALAS adalah KEGELAPAN, KAMI adalah CAHAYA,” yang mencerminkan semangat dan nilai-nilai yang dipegang teguh oleh seluruh komunitas sekolah.</p>
                        <p>Dengan berbagai prestasi yang telah diraih, SDN Rawasalak terus berkomitmen untuk menjadi lembaga pendidikan yang mampu mencetak generasi penerus yang berkompeten dan berakhlak mulia.</p>
                    </div>
                </div>
            </article>
	</div>

    <div class="container py-2">
		<div class="h1 text-center text-dark" id="pageHeaderTitle">VISI DAN MISI</div>
            <div class="row">
                <div class="col-lg-6">    
                    <article class="postcard light blue">
                        <div class="postcard__text t-dark">
                        <div class="postcard__title blue text-center">VISI</div>
                            <div class="postcard__preview-txt text-center">
                                Terwujudnya Siswa yang Beriman Kepada Tuhan Yang Maha Esa, Berakhlak Mulia, Mandiri, Cerdas, dan Kreatif
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-6">
                    <article class="postcard light blue">
                        <div class="postcard__text t-dark">
                        <div class="postcard__title blue text-center">MISI</div>
                            <div class="postcard__preview-txt">
                                <ul>
                                    <li>Meningkatkan Iman dan Taqwa serta Berakhlak Mulia</li>
                                    <li>Membentuk siswa yang berkarakter dan berperilaku baik</li>
                                    <li>Membiasakan diri hidup bertoleransi dengan warga sekolah</li>
                                    <li>Membiasakan perilaku Hidup Bersih dan Sehat (PHBS)</li>
                                    <li>Memberikan pelayanan terhadap warga sekolah dalam meningkatkan pengembangan belajar secara efisien dan efektif</li>
                                    <li>Memberikan layanan bagi siswa yang berkebutuhan khusus untuk diterima ke sekolah lanjutan</li>
                                    <li>Memotivasi siswa untuk meningkatkan prestasi akademik dan non akademik</li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
	        </div>
        </div>
    </div>

    <div class="container py-2">
    <div class="h1 text-center text-dark" id="pageHeaderTitle">TUJUAN DAN STRATEGI</div>
            <div class="row">
                <div class="col-lg-6"> 
                    <article class="postcard light blue">
                        <div class="postcard__text t-dark">
                        <div class="postcard__title blue text-center">TUJUAN</div>
                            <div class="postcard__preview-txt">
                                <ul>
                                    <li>Membentuk siswa yang beriman, santun, dan berakhlak mulia</li>
                                    <li>Merancang program sekolah untuk mengenalkan implementasi Profil Pelajar Pancasila</li>
                                    <li>Menerapkan pondasi mandiri dalam kegiatan kelas hingga sekolah</li>
                                    <li>Menciptakan siswa yang kreatif, terampil, dan dapat mengembangkan diri</li>
                                    <li>Meningkatkan kompetensi yang sehat, baik dalam bidang Akademik dan Non Akademik</li>
                                    <li>Meraih juara dalam lomba Pentas PAI, Calistung, MIPA, KOSN, FL2SN, dan Literasi</li>
                                </ul>
                            </div>
                        </div>
                    </article>
	            </div>
                <div class="col-lg-6"> 
                    <article class="postcard light blue">
                        <div class="postcard__text t-dark">
                        <div class="postcard__title blue text-center">STRATEGI</div>
                        <div class="postcard__preview-txt">
                            <ul>
                                <li>Membiasakan berdoa sebelum belajar, sesudah belajar, dan mengucapkan salam setiap hari</li>
                                <li>Membiasakan membaca Al-Quran surat-surat pendek dan buku perpustakaan (literasi) setiap hari sebelum pembelajaran dimulai</li>
                                <li>Membiasakan menyanyikan lagu “Indonesia Raya” sebelum pelajaran dimulai</li>
                                <li>Melaksanakan shalat Dzuhur berjamaah</li>
                                <li>Melaksanakan kegiatan keagamaan setiap hari Jumat</li>
                                <li>Menerapkan disiplin dalam berpakaian di sekolah</li>
                                <li>Mewajibkan peserta didik mengikuti upacara bendera setiap hari Senin dan upacara hari lainnya</li>
                                <li>Mewajibkan peserta didik mengikuti ekstrakurikuler Pramuka setiap hari Sabtu dan Olahraga</li>
                                <li>Membina peserta didik untuk mengikuti lomba Pentas PAI, Calistung, MIPA, KOSN, FL2SN, dan Literasi</li>
                            </ul>
                        </div>
                    </article>
	            </div>
            </div>
        </div>
    </div>

    <div class="container py-2">
		<div class="h1 text-center text-dark" id="pageHeaderTitle">STRUKTUR SDN RAWASALAK</div>
            <article class="postcard light blue">
                <div class="card">
                    <img src="<?= base_url('assets/img/tentang_kami/STRUKTUR SDNR FIX.png')?>" alt="" class="card-img-top">
                </div>
            </article>
        </div>
    </div>

    <div class="container">
        <div class="h1 text-center text-dark" id="pageHeaderTitle">EKSTRAKURIKULER</div>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/tentang_kami/pramuka.jpeg')?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">EKSTRAKURIKULER PRAMUKA</h5>
                        <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/tentang_kami/futsal.png')?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">EKSTRAKURIKULER FUTSAL</h5>
                        <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/tentang_kami/komputer.png')?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">EKSTRAKURIKULER KOMPUTER</h5>
                        <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/tentang_kami/musik-gamelan.png')?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">EKSTRAKURIKULER MUSIK GAMELAN</h5>
                        <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut eum similique repellat a laborum, rerum voluptates ipsam eos quo tempore iusto dolore modi dolorum in pariatur. Incidunt repellendus praesentium quae!</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="h1 text-center text-dark" id="pageHeaderTitle">PRESTASI DAN PENGHARGAAN</div>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/tentang_kami/OSN-matematika.jpeg')?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">Mewakili Kota Sukabumi di OSN Matematika di tingkat Provinsi</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/tentang_kami/olahraga-tradisional.jpeg')?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">Juara Olahraga Tradisional tingkat Kota</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/tentang_kami/tari-tradisional.png')?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">Juara Tari Tradisional FTBI</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

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