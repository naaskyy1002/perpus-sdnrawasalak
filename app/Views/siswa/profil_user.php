<?=$this->extend('siswa/template')?>
<?=$this->section('body')?>

<main id="main" class="main">

    <section class="section profile">
      <div class="row">
        <div class="col-xl-5">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src=<?= base_url("assets/img/" . ($profils['foto'] ?? 'profile-img.jpg')) ?> alt="Profile" class="rounded-circle">
              <h2><?= session()->get('username'); ?></h2>
              <h3><?= session()->get('level') == 1 ? 'Admin/Operator' : 'Siswa'; ?></h3>
            </div>
          </div>

        </div>  

        <div class="col-xl-7">  
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <!-- <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail Profil</button>
                </li>

              </ul> -->
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label ">NISN</div>
                    <div class="col-lg-8 col-md-8"><?= $profils['nisn']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-8 col-md-8"><?= $profils['username']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Tanggal Lahir</div>
                    <div class="col-lg-8 col-md-8">22 Maret 2003</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Jenis Kelamin</div>
                    <div class="col-lg-8 col-md-8"><?= $profils['jenis_kelamin']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Kelas</div>
                    <div class="col-lg-8 col-md-8"><?= $profils['kelas']; ?></div>
                  </div>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?=$this->endSection()?>