<?=$this->extend('admin/layout')?>
<?=$this->section('content')?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=<?=base_url('admin');?>>Beranda</a></li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </nav>
    </div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src=<?= base_url("assets/img/profile-img.jpg") ?> alt="Profile" class="rounded-circle">
              <h2><?= $profil['nama_lengkap']; ?></h2>
              <h3><?= $profil['jabatan']; ?></h3>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail Profil</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Detail Profil</h5>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">NIP</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['nip']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Nama Lengkap</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['nama_lengkap']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Jabatan</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['jabatan']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Tanggal Lahir</div>
                    <div class="col-lg-8 col-md-8"><?= date('d-M-Y', strtotime($profil['dob'])); ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Alamat</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['alamat']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Nomor Telepon</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['telp']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 label">Email</div>
                    <div class="col-lg-8 col-md-8"><?= $profil['email']; ?></div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <form action="<?= base_url('admin/updateProfil') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-4 col-form-label">Gambar Profil</label>
                      <div class="col-md-8 col-lg-8">
                        <img src="<?= base_url("assets/img/profile-img.jpg") ?>" alt="Profile" id="profileImagePreview" class="rounded-circle" style="width: 100px; height: 100px;">
                        <div class="pt-2">
                          <input type="file" name="profile_image" accept=".jpg,.png" class="form-control">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger btn-sm mt-2" title="Hapus gambar profil saya"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nip" class="col-md-4 col-lg-4 col-form-label">NIP</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="nip" type="text" class="form-control" id="nip" value="<?= $profil['nip']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nama_lengkap" class="col-md-4 col-lg-4 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" value="<?= $profil['nama_lengkap']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="jabatan" class="col-md-4 col-lg-4 col-form-label">Jabatan</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="jabatan" type="text" class="form-control" id="jabatan" value="<?= $profil['jabatan']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-4 col-form-label">Tanggal Lahir</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="dob" type="date" class="form-control" id="dob" value="<?= date('Y-m-d', strtotime($profil['dob'])); ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="alamat" class="col-md-4 col-lg-4 col-form-label">Alamat</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="alamat" type="text" class="form-control" id="alamat" value="<?= $profil['alamat']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="telp" class="col-md-4 col-lg-4 col-form-label">Nomor Telepon</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="telp" type="text" class="form-control" id="telp" value="<?= $profil['telp']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-4 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="email" type="email" class="form-control" id="email" value="<?= $profil['email']; ?>">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-dark">
        <div class="modal-body">
          Apakah Anda Yakin Ingin Menghapus Foto Anda?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <form method="post" action="deleteAdmin">
            <input type="hidden" id="nip" name="nip">
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
    </section>

  </main>
  <?=$this->endSection()?>
