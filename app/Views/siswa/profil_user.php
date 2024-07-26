<?=$this->extend('siswa/template')?>
<?=$this->section('body')?>

<main id="main" class="main">

    <section class="section profile">
      <div class="row">
        <div class="col-xl-5">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="<?= base_url('assets/img/siswa/' . session()->get('foto')); ?>" alt="Profile" class="rounded-circle">
              <h2><?= $profil['username']; ?></h2>
              <h3><?= session()->get('level') == 1 ? 'Admin/Operator' : 'Siswa'; ?></h3>
            </div>
          </div>
        </div>  

        <div class="col-xl-7">  
          <div class="card">
            <div class="card-body pt-3">
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 label ">NISN</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['nisn']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['username']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Tanggal Lahir</div>
                    <div class="col-lg-8 col-md-8"><?= date('d-M-Y', strtotime($profil['dob'])); ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Jenis Kelamin</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['jenis_kelamin']; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Kelas</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['kelas']; ?></div>
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